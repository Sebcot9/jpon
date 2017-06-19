<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_commande", type="date")
     */
    private $dateCommande;

    /**
     *  @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="listeCommande" ,cascade={"persist"})
     */
    private $possesseur;
    
    /**
     * @ORM\OneToOne(targetEntity="LivreBundle\Entity\Livre", cascade={"persist"})
     */
    private $livre;
    
    /**
     * @ORM\OneToOne(targetEntity="UserBundle\Entity\User", cascade={"persist"})
     */
    private $demandeur;
    
    public function __construct() {
        $this->dateCommande = new \DateTime('now');
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
     * Set dateCommande
     *
     * @param \DateTime $dateCommande
     *
     * @return Commande
     */
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    /**
     * Get dateCommande
     *
     * @return \DateTime
     */
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * Set livre
     *
     * @param \LivreBundle\Entity\Livre $livre
     *
     * @return Commande
     */
    public function setLivre(\LivreBundle\Entity\Livre $livre = null)
    {
        $this->livre = $livre;

        return $this;
    }

    /**
     * Get livre
     *
     * @return \LivreBundle\Entity\Livre
     */
    public function getLivre()
    {
        return $this->livre;
    }

    /**
     * Set demandeur
     *
     * @param \UserBundle\Entity\User $demandeur
     *
     * @return Commande
     */
    public function setDemandeur(\UserBundle\Entity\User $demandeur = null)
    {
        $this->demandeur = $demandeur;

        return $this;
    }

    /**
     * Get demandeur
     *
     * @return \UserBundle\Entity\User
     */
    public function getDemandeur()
    {
        return $this->demandeur;
    }

    /**
     * Set possesseur
     *
     * @param \UserBundle\Entity\User $possesseur
     *
     * @return Commande
     */
    public function setPossesseur(\UserBundle\Entity\User $possesseur = null)
    {
        $this->possesseur = $possesseur;

        return $this;
    }

    /**
     * Get possesseur
     *
     * @return \UserBundle\Entity\User
     */
    public function getPossesseur()
    {
        return $this->possesseur;
    }
}
