<?php

namespace LivreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use LivreBundle\Entity\Livre;
use LivreBundle\Form\LivreType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LivreBundle:Default:Accueil.html.twig');
    }

    public function mabiblioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $liste_livres = $em->getRepository('LivreBundle:Livre')->findAllCustom();

        return $this->render('LivreBundle:Jpo:Ma_Bibliotheque.html.twig', array(
          'livres' => $liste_livres,
        ));
    }

    public function biblioAction()
    {
        return $this->render('LivreBundle:Jpo:Bibliotheque.html.twig');
    }

    public function livreAction()
    {
        return $this->render('LivreBundle:Jpo:Livre.html.twig');
    }

    public function rechercheAction()
    {
        return $this->render('LivreBundle:Jpo:Recherche.html.twig');
    }

    public function proposAction()
    {
        return $this->render('LivreBundle:Jpo:A_Propos.html.twig');
    }

    public function ajoutAction(Request $request)
    {
        // ------------ Formulaire livre DEBUT ------------
        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
              // Ajout de la donnée
              $em = $this->getDoctrine()->getManager();
              $em->persist($livre);
              $em->flush();
              // Ajout d'un éventuel flashbag
              $request->getSession()->getFlashBag()->add('notice', 'Livre bien ajouté.');

              return $this->redirectToRoute('livre_ajout');
        }
        // ------------ Formulaire livre FIN ------------

        return $this->render('LivreBundle:Jpo:ajout.html.twig', array(
          'form' => $form->createView(),
        ));

    }
}
