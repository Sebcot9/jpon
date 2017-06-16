<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToOne(targetEntity="UserBundle\Entity\Commande", cascade={"persist"})
     */
    public $demande;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="UserBundle\Entity\Commande", mappedBy="possesseur", cascade={"persist","remove"})
     */
    public $listeCommande;
    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=50)
     */
    protected $nom;
    
    /** 
     * @var string
     * @ORM\Column(name="prenom", type="string", length=50)
     */
    protected $prenom;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date")
     */
    protected $dateNaissance;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="LivreBundle\Entity\Livre", mappedBy="user", cascade={"persist","remove"})
     * @ORM\JoinColumn(name="livres", referencedColumnName="id")
     */
    private $livres;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Adresse", inversedBy="user", cascade={"persist"})
     * @ORM\JoinColumn() 
     */
    private $adresse;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->livres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idAdresse = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add Livre
     *
     * @param \LivreBundle\Entity\Livre $livre
     *
     * @return User
     */
    public function addLivres(\LivreBundle\Entity\Livre $livre)
    {
        $this->livres[] = $livre;

        return $this;
    }

    /**
     * Remove Livre
     *
     * @param \LivreBundle\Entity\Livre $livre
     */
    public function removeLivre(\LivreBundle\Entity\Livre $livre)
    {
        $this->livres->removeElement($livre);
    }

    /**
     * Get livres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getlivre()
    {
        return $this->livres;
    }

    /**
     * Add adresse
     *
     * @param \UserBundle\Entity\Adresse $adresse
     *
     * @return User
     */
    public function setAdresse(\UserBundle\Entity\Adresse $adresse=null)
    {
        $this->adresse = $adresse;

        return $this;
    }
    /**
     * Get adresse
     * 
     * @return \UserBundle\Entity\Adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return User
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Add livre
     *
     * @param \LivreBundle\Entity\Livre $livre
     *
     * @return User
     */
    public function addLivre(\LivreBundle\Entity\Livre $livre)
    {
        $this->livres[] = $livre;

        return $this;
    }

    /**
     * Get livres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLivres()
    {
        return $this->livres;
    }

    /**
     * Add listeCommande
     *
     * @param \UserBundle\Entity\Commande $listeCommande
     *
     * @return User
     */
    public function addListeCommande(\UserBundle\Entity\Commande $listeCommande)
    {
        $this->listeCommande[] = $listeCommande;

        return $this;
    }

    /**
     * Remove listeCommande
     *
     * @param \UserBundle\Entity\Commande $listeCommande
     */
    public function removeListeCommande(\UserBundle\Entity\Commande $listeCommande)
    {
        $this->listeCommande->removeElement($listeCommande);
    }

    /**
     * Get listeCommande
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getListeCommande()
    {
        return $this->listeCommande;
    }

    /**
     * Set demande
     *
     * @param \UserBundle\Entity\User $demande
     *
     * @return User
     */
    public function setDemande(\UserBundle\Entity\User $demande = null)
    {
        $this->demande = $demande;

        return $this;
    }

    /**
     * Get demande
     *
     * @return \UserBundle\Entity\User
     */
    public function getDemande()
    {
        return $this->demande;
    }
}
