<?php

namespace LivreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LivreBundle:Default:Accueil.html.twig');
    }
    
    public function mabiblioAction()
    {
        return $this->render('LivreBundle:Jpo:Ma_Bibliotheque.html.twig');
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
}

