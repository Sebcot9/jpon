<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function userAction()
    {
        return $this->render('UserBundle:User:Compte.html.twig');
    }
    public function connectionAction()
    {
        return $this->render('UserBundle:User:Connexion.html.twig');
    }
    public function inscriptionAction()
    {
        return $this->render('UserBundle:User:Inscription.html.twig');
    }

}
