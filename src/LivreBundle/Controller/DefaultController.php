<?php

namespace LivreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Commande;
use LivreBundle\Entity\Livre;
use LivreBundle\Form\LivreType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $liste_livres = $em->getRepository('LivreBundle:Livre')->findAllCustom();

   
        return $this->render('LivreBundle:Default:Accueil.html.twig',array(
          'livres' => $liste_livres,
        ));
    }

    public function mabiblioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $liste_livres = $em->getRepository('LivreBundle:Livre')->findByUser($user);

        return $this->render('LivreBundle:Jpo:Ma_Bibliotheque.html.twig', array(
          'livres' => $liste_livres,
        ));
    }

    public function biblioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $liste_livres = $em->getRepository('LivreBundle:Livre')->findAllCustom();

        return $this->render('LivreBundle:Jpo:Bibliotheque.html.twig', array(
          'livres' => $liste_livres,
        ));
    }

    public function livreAction($id)
    {
        $user = $this->getUser();
        
        $repository = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LivreBundle:Livre')
        ;

        $livre = $repository->find($id);
        return $this->render('LivreBundle:Jpo:Livre.html.twig', array('livre' => $livre, 'user' => $user, ));
    }

    public function supprAction(Request $request,$id)
    {
        if ($request->isMethod('POST')) {
              // Ajout de la donnée
        $em = $this->getDoctrine()->getManager();
        $repository = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LivreBundle:Livre')
        ;

        $livre = $repository->find($id);
        $em->remove($livre);
        
        $request->getSession()->getFlashBag()->add('notice', 'Livre bien ajouté.');
        }
        return $this->render('UserBundle:Profile:show.html.twig');
    }
    
    public function rechercheAction(Request $request)
    {
        $title = $request->request->get("titre");
        $em = $this->getDoctrine()->getManager();
        $livres = $em->getRepository('LivreBundle:Livre')->findByTitleLike($title);
        return $this->render('LivreBundle:Jpo:Recherche.html.twig', array('livres' => $livres,));
    }

    public function proposAction()
    {
        return $this->render('LivreBundle:Jpo:A_Propos.html.twig');
    }

    public function ajoutAction(Request $request)
    {
        // ------------ Formulaire livre DEBUT ------------
        $livre = new Livre();
        $user = $this->getUser();
        $form = $this->createForm(LivreType::class, $livre);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
              // Ajout de la donnée
              $em = $this->getDoctrine()->getManager();
              $livre->setUser($user);
              $em->persist($livre);
              $em->flush();
              // Ajout d'un éventuel flashbag
              $request->getSession()->getFlashBag()->add('notice', 'Livre bien ajouté.');

              return $this->redirectToRoute('livre_ajout');
        }
        // ------------ Formulaire livre FIN ------------

        return $this->render('LivreBundle:Default:Accueil.html.twig', array(
          'form' => $form->createView(),
        ));

    }
    
    public function demandeAction($id)
    {
        //$user = $this->getUser();
        
        $repository = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('UserBundle:Commande')
        ;

        $commande = $repository->find($id);
        return $this->render('LivreBundle:Jpo:Demande.html.twig', array('commande' => $commande, ));
    }
    public function validationAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        
        $repository = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('UserBundle:Commande')
        ;

        $commande = $repository->find($id);
        $livre = $commande->getLivre();
        $newUser = $commande->getDemandeur();
        $oldUser = $commande->getPossesseur();
        $livre->setUser($newUser);
        $livre->setEtat("Partagé par ".$oldUser->getUsername());
        $em->persist($livre);
        $em->remove($commande);
        $em->flush();
        $request->getSession()->getFlashBag()->add('notice', 'Commande validée.');
        
        return $this->redirect($this->generateUrl('fos_user_profile_show'));

    }
    
    public function echangeAction($id){
        $em = $this->getDoctrine()->getManager();
        $commande = new Commande();
        $demandeur = $this->getUser();
        $repository = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LivreBundle:Livre')
        ;

        $livre = $repository->find($id);
        $possesseur = $livre->getUser();
        $commande->setDemandeur($demandeur)
                ->setLivre($livre)
                ->setPossesseur($possesseur);
        $livre-setCommande($commande);
        $em->persist($livre);
        $em->persist($commande);
        $em->flush();
        
        return $this->render('LivreBundle:Jpo:Commande.html.twig', array('commande' => $commande, ));
        
    }
}
