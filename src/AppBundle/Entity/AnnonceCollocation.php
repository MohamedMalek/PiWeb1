<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * AnnonceCollocation
 *
 * @ORM\Table(name="annonce_collocation")
 * @ORM\Entity(repositoryClass="CollocationBundle\Repository\AnnonceCollocationRepository")
 */
class AnnonceCollocation
{ private $eq;

    /**
     * @return mixed
     */
    public function getEq()
    {
        return (str_split($this->equipements));
    }

    /**
     * @param mixed $eq
     */
    public function setEq($eq)
    {
        $this->eq = $eq;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="id_annonce", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAnnonce;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_annonceur", type="integer", nullable=false)
     */
    private $idAnnonceur;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_annonce", type="string", length=50, nullable=false)
     */
    private $titreAnnonce;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=100, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="tarif", type="float", precision=10, scale=0, nullable=false)
     */
    private $tarif;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=50, nullable=false)
     */
    private $adresse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="date", nullable=true)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="date", nullable=true)
     */
    private $datefin;

    /**
     * @var integer
     *
     * @ORM\Column(name="Signale", type="integer", nullable=true)
     */
    private $signale;

    /**
     * @var integer
     *
     * @ORM\Column(name="IsBlackListed", type="integer", nullable=true)
     */
    private $IsBlackListed;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombreChambres", type="integer", nullable=true)
     */
    private $nombrechambres;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombresLits", type="integer", nullable=false)
     */
    private $nombreslits;

    /**
     * @var string
     *
     * @ORM\Column(name="Equipements", type="string", length=2000, nullable=true)
     */
    private $equipements;
    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Reclamation",cascade={"remove","persist"})
     * @ORM\JoinTable(name="AnnonceCollocation_Reclamation",
     *      joinColumns={@ORM\JoinColumn(name="id_annonce", referencedColumnName="id_annonce")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="reclamation_id", referencedColumnName="id", unique=true,onDelete="CASCADE")}
     *      )
     */
    private $reclamations;

    /**
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "image/png" })
     */
    private $image;
    /**
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "image/png" })
     */
    private $image1;
    /**
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "image/png" })
     */
    private $image2;
    /**
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "image/png" })
     */
    private $image3;

    /**
     * @return mixed
     */
    public function getImage1()
    {
        return $this->image1;
    }

    /**
     * @param mixed $image1
     */
    public function setImage1($image1)
    {
        $this->image1 = $image1;
    }

    /**
     * @return mixed
     */
    public function getImage2()
    {
        return $this->image2;
    }

    /**
     * @param mixed $image2
     */
    public function setImage2($image2)
    {
        $this->image2 = $image2;
    }

    /**
     * @return mixed
     */
    public function getImage3()
    {
        return $this->image3;
    }

    /**
     * @param mixed $image3
     */
    public function setImage3($image3)
    {
        $this->image3 = $image3;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


    /**
     * Get idAnnonce
     *
     * @return integer
     */
    public function getIdAnnonce()
    {
        return $this->idAnnonce;
    }

    /**
     * Set idAnnonceur
     *
     * @param integer $idAnnonceur
     *
     * @return AnnonceCollocation
     */
    public function setIdAnnonceur($idAnnonceur)
    {
        $this->idAnnonceur = $idAnnonceur;

        return $this;
    }

    /**
     * Get idAnnonceur
     *
     * @return integer
     */
    public function getIdAnnonceur()
    {
        return $this->idAnnonceur;
    }

    /**
     * Set titreAnnonce
     *
     * @param string $titreAnnonce
     *
     * @return AnnonceCollocation
     */
    public function setTitreAnnonce($titreAnnonce)
    {
        $this->titreAnnonce = $titreAnnonce;

        return $this;
    }

    /**
     * Get titreAnnonce
     *
     * @return string
     */
    public function getTitreAnnonce()
    {
        return $this->titreAnnonce;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return AnnonceCollocation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set tarif
     *
     * @param float $tarif
     *
     * @return AnnonceCollocation
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return float
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return AnnonceCollocation
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return AnnonceCollocation
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     *
     * @return AnnonceCollocation
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set signale
     *
     * @param integer $signale
     *
     * @return AnnonceCollocation
     */
    public function setSignale($signale)
    {
        $this->signale = $signale;

        return $this;
    }

    /**
     * Get signale
     *
     * @return integer
     */
    public function getSignale()
    {
        return $this->signale;
    }

    /**
     * Get IsBlackListed
     *
     * @return integer
     */
    public function getisBlackListed()
    {
        return $this->IsBlackListed;
    }

    /**
     * Set IsBlackListed
     *
     * @param integer $IsBlackListed
     *
     * @return AnnonceCollocation
     */
    public function setIsBlackListed($IsBlackListed)
    {
        $this->IsBlackListed = $IsBlackListed;
        return $this;
    }

    /**
     * Set nombrechambres
     *
     * @param integer $nombrechambres
     *
     * @return AnnonceCollocation
     */
    public function setNombrechambres($nombrechambres)
    {
        $this->nombrechambres = $nombrechambres;

        return $this;
    }

    /**
     * Get nombrechambres
     *
     * @return integer
     */
    public function getNombrechambres()
    {
        return $this->nombrechambres;
    }

    /**
     * Set nombreslits
     *
     * @param integer $nombreslits
     *
     * @return AnnonceCollocation
     */
    public function setNombreslits($nombreslits)
    {
        $this->nombreslits = $nombreslits;

        return $this;
    }

    /**
     * Get nombreslits
     *
     * @return integer
     */
    public function getNombreslits()
    {
        return $this->nombreslits;
    }
    public function resetEquipement(){
        $this->equipements="";
        return ;
    }
    /**
     * Set equipements
     *
     * @param array $equipements
     *
     * @return AnnonceCollocation
     */
    public function setEquipements(array $equipements)
    {
        foreach ($equipements as $eq)

        $this->equipements=$this->equipements.$eq;

        return $this;
    }

    /**
     * Get equipements
     *
     * @return string
     */
    public function getEquipements()
    {
        return $this->equipements;
    }
    public function getEquipementstoarray()
    {
        return (str_split($this->equipements));
    }
}
