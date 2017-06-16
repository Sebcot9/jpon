<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Adresse;
use Maxmind\Bundle\GeoipBundle\Service\GeoipManager as GeoIp;
use UserBundle\Form\AdresseType;
use AppBundle\Form\RegistrationType;

class UserController extends Controller
{
    public function userAction()
    {
        return $this->render('UserBundle:User:Compte.html.twig');   
    }

    public function geolocAction(Request $request)     
    {
        $ip = $request->getClientIp();
        //$geoip = new GeoIp();
        $geoip = $this->get('maxmind.geoip')->lookup("88.174.106.183");
        //$ville = $geoip->getCity();
        //$countrycode = $this->getCountryCode();
        $adresse = new Adresse();
        $adresse->setCodePostal($geoip->getCountryCode());
        $adresse->setVille($geoip->getCity());
        $adresse->setPosX($geoip->getLongitude());
        $adresse->setPosY($geoip->getLatitude());
        $form = $this->createForm(RegistrationType::Type);
        $form->get('adresse')->get('codePostal')->setData($geoip->getCountryCode());
        $form->get('adresse')->get('ville')->setData($geoip->getCity());
        
        return $this->render('@FOSUser/Registration/register.html.twig', array( 
            'form' => $form->createView() ));
    }
}