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
     * @ORM\ManyToMany(targetEntity="LivreBundle\Entity\Livre", mappedBy="id")
     */
    private $idLivre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Adresse")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="id_adresse", referencedColumnName="id")})
     */
    private $adresse;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->idLivre = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idAdresse = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add idLivre
     *
     * @param \UserBundle\Entity\Livre $idLivre
     *
     * @return User
     */
    public function addIdLivre(\UserBundle\Entity\Livre $idLivre)
    {
        $this->idLivre[] = $idLivre;

        return $this;
    }

    /**
     * Remove idLivre
     *
     * @param \UserBundle\Entity\Livre $idLivre
     */
    public function removeIdLivre(\UserBundle\Entity\Livre $idLivre)
    {
        $this->idLivre->removeElement($idLivre);
    }

    /**
     * Get idLivre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdLivre()
    {
        return $this->idLivre;
    }

    /**
     * Add idAdresse
     *
     * @param \UserBundle\Entity\Adresse $idAdresse
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
}
