<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe", uniqueConstraints={@ORM\UniqueConstraint(name="pays", columns={"pays"})})
 * @ORM\Entity(repositoryClass="GestionEquipeBundle\Repository\EquipeRepository")
 */
class Equipe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_equipe", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEquipe;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=40, nullable=false)
     */
    private $pays;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat;

    /**
     * @var integer
     *
     * @ORM\Column(name="nblike", type="integer", nullable=false)
     */

    private $nblike = '0';
    /**
     * @var integer
     *
     * @ORM\Column(name="nbdislike", type="integer", nullable=false)
     */
    private $nbdislike = '0';

    /**
     * @return int
     */
    public function getNblike()
    {
        return $this->nblike;
    }

    /**
     * @param int $nblike
     */
    public function setNblike($nblike)
    {
        $this->nblike = $nblike;
    }

    /**
     * @return int
     */
    public function getNbdislike()
    {
        return $this->nbdislike;
    }

    /**
     * @param int $nbdislike
     */
    public function setNbdislike($nbdislike)
    {
        $this->nbdislike = $nbdislike;
    }


    /**
     * @var string
     *
     * @ORM\Column(name="Phase", type="string", length=20, nullable=true)
     */
    private $phase;

    /**
     * @var string
     *
     * @ORM\Column(name="Groupe", type="string", length=2, nullable=false)
     */
    private $groupe;

    /**
     * @var string
     *
     * @ORM\Column(name="Selecteur", type="string", length=40, nullable=true)
     */
    private $selecteur;
    /**
     * @var string
     *
     * @ORM\Column(name="liendrapeau", type="string", length=300, nullable=true)
     */
    private $liendrapeau;
    /**
     * @var integer
     *
     * @ORM\Column(name="point", type="integer", nullable=false)
     */
    private $point;

    /**
     * Equipe constructor.
     */
    public function __construct()
    {
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
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param string $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    /**
     * @return int
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param int $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return string
     */
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * @param string $phase
     */
    public function setPhase($phase)
    {
        $this->phase = $phase;
    }

    /**
     * @return string
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * @param string $groupe
     */
    public function setGroupe($groupe)
    {
        $this->groupe = $groupe;
    }

    /**
     * @return string
     */
    public function getSelecteur()
    {
        return $this->selecteur;
    }

    /**
     * @param string $selecteur
     */
    public function setSelecteur($selecteur)
    {
        $this->selecteur = $selecteur;
    }

    /**
     * @return int
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * @param int $point
     */
    public function setPoint($point)
    {
        $this->point = $point;
    }

    /**
     * @return string
     */
    public function getLiendrapeau()
    {
        return $this->liendrapeau;
    }

    /**
     * @param string $liendrapeau
     */
    public function setLiendrapeau($liendrapeau)
    {
        $this->liendrapeau = $liendrapeau;
    }


}

