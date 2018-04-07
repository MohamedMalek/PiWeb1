<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matchs
 *
 * @ORM\Table(name="matchs")
 * @ORM\Entity
 */
class Matchs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_match", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMatch;

    /**
     * @var integer
     *
     * @ORM\Column(name="score", type="integer", nullable=true)
     */
    private $score;

    /**
     * @var integer
     *
     * @ORM\Column(name="score2", type="integer", nullable=true)
     */
    private $score2;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equipe")
     * @ORM\JoinColumn(name="nom_equipe1", referencedColumnName="pays")
     */
    private $nomEquipe1;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equipe")
     * @ORM\JoinColumn(name="nom_equipe2", referencedColumnName="pays")
     */
    private $nomEquipe2;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equipe")
     * @ORM\JoinColumn(name="idEquipe1", referencedColumnName="id_equipe")
     */
    private $idEquipe1;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equipe")
     * @ORM\JoinColumn(name="idEquipe2", referencedColumnName="id_equipe")
     */
    private $idEquipe2;
    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=20, nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Stade")
     * @ORM\JoinColumn(name="nom_stade", referencedColumnName="id")
     */
    private $nomStade;

    /**
     * @var string
     *
     * @ORM\Column(name="heure", type="string", length=20, nullable=false)
     */
    private $heure;

    /**
     * @var string
     *
     * @ORM\Column(name="phase", type="string", length=255, nullable=false)
     */
    private $phase;

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @return int
     */
    public function getIdMatch()
    {
        return $this->idMatch;
    }

    /**
     * @param int $idMatch
     */
    public function setIdMatch($idMatch)
    {
        $this->idMatch = $idMatch;
    }


    /**
     * @param int $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return int
     */
    public function getScore2()
    {
        return $this->score2;
    }

    /**
     * @param int $score2
     */
    public function setScore2($score2)
    {
        $this->score2 = $score2;
    }

    /**
     * @return string
     */
    public function getNomEquipe1()
    {
        return $this->nomEquipe1;
    }

    /**
     * @param string $nomEquipe1
     */
    public function setNomEquipe1($nomEquipe1)
    {
        $this->nomEquipe1 = $nomEquipe1;
    }

    /**
     * @return string
     */
    public function getNomEquipe2()
    {
        return $this->nomEquipe2;
    }

    /**
     * @param string $nomEquipe2
     */
    public function setNomEquipe2($nomEquipe2)
    {
        $this->nomEquipe2 = $nomEquipe2;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getNomStade()
    {
        return $this->nomStade;
    }

    /**
     * @param string $nomStade
     */
    public function setNomStade($nomStade)
    {
        $this->nomStade = $nomStade;
    }

    /**
     * @return string
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * @param string $heure
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;
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
     * @return int
     */
    public function getIdEquipe1()
    {
        return $this->idEquipe1;
    }

    /**
     * @param int $idEquipe1
     */
    public function setIdEquipe1($idEquipe1)
    {
        $this->idEquipe1 = $idEquipe1;
    }

    /**
     * @return int
     */
    public function getIdEquipe2()
    {
        return $this->idEquipe2;
    }

    /**
     * @param int $idEquipe2
     */
    public function setIdEquipe2($idEquipe2)
    {
        $this->idEquipe2 = $idEquipe2;
    }


}

