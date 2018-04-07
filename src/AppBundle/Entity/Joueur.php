<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur", uniqueConstraints={@ORM\UniqueConstraint(name="nom", columns={"nom"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JoueurRepository")
 */
class Joueur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_joueur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idJoueur;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equipe")
     * @ORM\JoinColumn(name="idEquipe",referencedColumnName="id_equipe")
     */
    private $idEquipe;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=40, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombre_de_buts", type="integer", nullable=false)
     */
    private $nombreDeButs = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=20, nullable=true)
     */
    private $position;

    /**
     * @var integer
     *
     * @ORM\Column(name="cartrouge", type="integer", nullable=true)
     */
    private $cartrouge = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="cartjaune", type="integer", nullable=false)
     */
    private $cartjaune = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="NumeroMaillot", type="integer", nullable=false)
     */
    private $numeromaillot;

    /**
     * Joueur constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getIdJoueur()
    {
        return $this->idJoueur;
    }

    /**
     * @param int $idJoueur
     */
    public function setIdJoueur($idJoueur)
    {
        $this->idJoueur = $idJoueur;
    }

    /**
     * @return int
     */
    public function getIdEquipe()
    {
        return $this->idEquipe;
    }

    /**
     * @param int $idEquipe
     */
    public function setIdEquipe($idEquipe)
    {
        $this->idEquipe = $idEquipe;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return int
     */
    public function getNombreDeButs()
    {
        return $this->nombreDeButs;
    }

    /**
     * @param int $nombreDeButs
     */
    public function setNombreDeButs($nombreDeButs)
    {
        $this->nombreDeButs = $nombreDeButs;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return int
     */
    public function getCartrouge()
    {
        return $this->cartrouge;
    }

    /**
     * @param int $cartrouge
     */
    public function setCartrouge($cartrouge)
    {
        $this->cartrouge = $cartrouge;
    }

    /**
     * @return int
     */
    public function getCartjaune()
    {
        return $this->cartjaune;
    }

    /**
     * @param int $cartjaune
     */
    public function setCartjaune($cartjaune)
    {
        $this->cartjaune = $cartjaune;
    }

    /**
     * @return int
     */
    public function getNumeromaillot()
    {
        return $this->numeromaillot;
    }

    /**
     * @param int $numeromaillot
     */
    public function setNumeromaillot($numeromaillot)
    {
        $this->numeromaillot = $numeromaillot;
    }


    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=300, nullable=true)
     */
    private $lien;

    /**
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * @param string $lien
     */
    public function setLien($lien)
    {
        $this->lien = $lien;
    }



}

