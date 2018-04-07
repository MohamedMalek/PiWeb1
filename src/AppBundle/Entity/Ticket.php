<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket", indexes={@ORM\Index(name="idMatch", columns={"idMatch"}), @ORM\Index(name="id_annonceur", columns={"id_annonceur"})})
 * @ORM\Entity
 */
class Ticket
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_ticket", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTicket;

    /**
     * @var string
     *
     * @ORM\Column(name="categories", type="string", length=50, nullable=false)
     */
    private $categories;

    /**
     * @var integer
     *
     * @ORM\Column(name="NbTicket", type="integer", nullable=false)
     */
    private $nbticket;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateajout", type="datetime", nullable=false)
     */
    private $dateajout = 'CURRENT_TIMESTAMP';

    /**
     * @var float
     *
     * @ORM\Column(name="moyenne", type="float", precision=10, scale=0, nullable=true)
     */
    private $moyenne;

    /**
     * @var \Matchs
     *
     * @ORM\ManyToOne(targetEntity="Matchs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMatch", referencedColumnName="id_match")
     * })
     */
    private $idmatch;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_annonceur", referencedColumnName="id")
     * })
     */
    private $idAnnonceur;



    /**
     * @return int
     */
    public function getIdTicket()
    {
        return $this->idTicket;
    }

    /**
     * @param int $idTicket
     */
    public function setIdTicket($idTicket)
    {
        $this->idTicket = $idTicket;
    }

    /**
     * @return string
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param string $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return int
     */
    public function getNbticket()
    {
        return $this->nbticket;
    }

    /**
     * @param int $nbticket
     */
    public function setNbticket($nbticket)
    {
        $this->nbticket = $nbticket;
    }

    /**
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return \DateTime
     */
    public function getDateajout()
    {
        return $this->dateajout;
    }

    /**
     * @param \DateTime $dateajout
     */
    public function setDateajout($dateajout)
    {
        $this->dateajout = $dateajout;
    }

    /**
     * @return float
     */
    public function getMoyenne()
    {
        return $this->moyenne;
    }

    /**
     * @param float $moyenne
     */
    public function setMoyenne($moyenne)
    {
        $this->moyenne = $moyenne;
    }

    /**
     * @return \Matchs
     */
    public function getIdmatch()
    {
        return $this->idmatch;
    }

    /**
     * @param \Matchs $idmatch
     */
    public function setIdmatch($idmatch)
    {
        $this->idmatch = $idmatch;
    }

    /**
     * @return \FosUser
     */
    public function getIdAnnonceur()
    {
        return $this->idAnnonceur;
    }

    /**
     * @param \User $idAnnonceur
     */
    public function setIdAnnonceur($idAnnonceur)
    {
        $this->idAnnonceur = $idAnnonceur;
    }



}

