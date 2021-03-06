<?php

namespace LivreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Livre
 *
 * @ORM\Table(name="livre")
 * @ORM\Entity(repositoryClass="LivreBundle\Repository\LivreRepository")
 */
class Livre
{
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="livres")
     * @ORM\JoinColumn(nullable=false) 
     */
    private $user;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="text", nullable=true)
     */
    private $resume;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="date")
     */
    private $dateAjout;
    
    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=true)
     */
    private $etat;
    
    /**
     * @var string
     *
     * @ORM\Column(name="editeur", type="string", length=255, nullable=true)
     */
    private $editeur;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=255, nullable=true)
     */
    private $auteur;

    
    /**
    * @ORM\ManyToMany(targetEntity="LivreBundle\Entity\Genre", cascade={"persist"})
    */
     private $genres;

     /**
      * @ORM\OneToOne(targetEntity="UserBundle\Entity\Commande", cascade={"persist"})
      */
     private $commande;
     
     /**
     * @ORM\OneToOne(targetEntity="LivreBundle\Entity\Image", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\JoinColumn(nullable=true)
     */
     private $imageLivre;

     public function __construct()
     {
        // default date is today's date
        $this->dateAjout = new \DateTime('now');
        $this->genres = new ArrayCollection();
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Livre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set resume
     *
     * @param string $resume
     *
     * @return Livre
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Livre
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set editeur
     *
     * @param string $editeur
     *
     * @return Livre
     */
    public function setEditeur($editeur)
    {
        $this->editeur = $editeur;

        return $this;
    }

    /**
     * Get editeur
     *
     * @return string
     */
    public function getEditeur()
    {
        return $this->editeur;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     *
     * @return Livre
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Add genre
     *
     * @param \LivreBundle\Entity\Genre $genre
     *
     * @return Livre
     */
    public function addGenre(\LivreBundle\Entity\Genre $genre)
    {
        $this->genres[] = $genre;

        return $this;
    }

    /**
     * Remove genre
     *
     * @param \LivreBundle\Entity\Genre $genre
     */
    public function removeGenre(\LivreBundle\Entity\Genre $genre)
    {
        $this->genres->removeElement($genre);
    }

    /**
     * Get genres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * Set imageLivre
     *
     * @param \LivreBundle\Entity\Image $imageLivre
     *
     * @return Livre
     */
    public function setImageLivre(\LivreBundle\Entity\Image $imageLivre)
    {
        $this->imageLivre = $imageLivre;

        return $this;
    }

    /**
     * Get imageLivre
     *
     * @return \LivreBundle\Entity\Image
     */
    public function getImageLivre()
    {
        return $this->imageLivre;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Livre
     */
    public function setUser(\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return Livre
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * Set commande
     *
     * @param \UserBundle\Entity\Commande $commande
     *
     * @return Livre
     */
    public function setCommande(\UserBundle\Entity\Commande $commande = null)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return \UserBundle\Entity\Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }
}
