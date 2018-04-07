<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class Utilisateur extends BaseUser
{public function __construct()
{
    parent::__construct();

}
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=180, nullable=true)
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=20, nullable=true)
     */
    private $telephone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="fumeur", type="boolean", nullable=true)
     */
    private $fumeur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=40, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=40, nullable=true)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_de_naissances", type="date", nullable=true)
     */
    private $dateDeNaissances;

    /**
     * @var string
     *
     * @ORM\Column(name="Img_profile", type="string", length=200, nullable=true)
     */
    private $imgProfile;

    /**
     * @var integer
     *
     * @ORM\Column(name="Numdeconfirmation", type="integer", nullable=false)
     */
    private $numdeconfirmation;

    /**
     * Utilisateur constructor.
     */

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return bool
     */
    public function isFumeur()
    {
        return $this->fumeur;
    }

    /**
     * @param bool $fumeur
     */
    public function setFumeur($fumeur)
    {
        $this->fumeur = $fumeur;
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
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return \DateTime
     */
    public function getDateDeNaissances()
    {
        return $this->dateDeNaissances;
    }

    /**
     * @param \DateTime $dateDeNaissances
     */
    public function setDateDeNaissances($dateDeNaissances)
    {
        $this->dateDeNaissances = $dateDeNaissances;
    }

    /**
     * @return string
     */
    public function getImgProfile()
    {
        return $this->imgProfile;
    }

    /**
     * @param string $imgProfile
     */
    public function setImgProfile($imgProfile)
    {
        $this->imgProfile = $imgProfile;
    }

    /**
     * @return int
     */
    public function getNumdeconfirmation()
    {
        return $this->numdeconfirmation;
    }

    /**
     * @param int $numdeconfirmation
     */
    public function setNumdeconfirmation($numdeconfirmation)
    {
        $this->numdeconfirmation = $numdeconfirmation;
    }


}

