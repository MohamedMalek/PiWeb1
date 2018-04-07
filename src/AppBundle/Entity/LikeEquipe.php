<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * LikeEquipe
 *
 * @ORM\Table(name="likeequipe")
 * @ORM\Entity
 */

class LikeEquipe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_like", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLike;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equipe")
     * @ORM\JoinColumn(name="idEquipe",referencedColumnName="id_equipe")
     */
    private $idEquipe;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUtilisateur", referencedColumnName="id")
     * })
     */
    private $idUtilisateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="like", type="integer", nullable=false)
     */
    private $lik;

    /**
     * @var integer
     *
     * @ORM\Column(name="dislike", type="integer", nullable=false)
     */
    private $dislik;

    /**
     * LikeEquipe constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getIdlike()
    {
        return $this->idLike;
    }

    /**
     * @param int $idlike
     */
    public function setIdlike($idLike)
    {
        $this->idLike = $idLike;
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
     * @return int
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * @param int $idUtilisateur
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    /**
     * @return int
     */
    public function getLik()
    {
        return $this->lik;
    }

    /**
     * @param int $lik
     */
    public function setLik($lik)
    {
        $this->lik = $lik;
    }

    /**
     * @return int
     */
    public function getDislik()
    {
        return $this->dislik;
    }

    /**
     * @param int $dislik
     */
    public function setDislik($dislik)
    {
        $this->dislik = $dislik;
    }




}

