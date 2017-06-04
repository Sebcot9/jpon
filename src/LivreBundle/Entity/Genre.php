<?php

namespace LivreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @ORM\Table(name="genre")
 * @ORM\Entity(repositoryClass="LivreBundle\Repository\GenreRepository")
 */
class Genre
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
     * @var string
     *
     * @ORM\Column(name="Nom_genre", type="string", length=255, unique=true)
     */
    private $nomGenre;


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
     * Set nomGenre
     *
     * @param string $nomGenre
     *
     * @return Genre
     */
    public function setNomGenre($nomGenre)
    {
        $this->nomGenre = $nomGenre;

        return $this;
    }

    /**
     * Get nomGenre
     *
     * @return string
     */
    public function getNomGenre()
    {
        return $this->nomGenre;
    }
}

