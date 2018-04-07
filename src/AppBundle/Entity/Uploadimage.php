<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uploadimage
 *
 * @ORM\Table(name="uploadimage")
 * @ORM\Entity
 */
class Uploadimage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_media", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMedia;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_annonce", type="integer", nullable=false)
     */
    private $idAnnonce;

    /**
     * @var string
     *
     * @ORM\Column(name="media_link", type="string", length=200, nullable=false)
     */
    private $mediaLink;



    /**
     * Get idMedia
     *
     * @return integer
     */
    public function getIdMedia()
    {
        return $this->idMedia;
    }

    /**
     * Set idAnnonce
     *
     * @param integer $idAnnonce
     *
     * @return Uploadimage
     */
    public function setIdAnnonce($idAnnonce)
    {
        $this->idAnnonce = $idAnnonce;

        return $this;
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
     * Set mediaLink
     *
     * @param string $mediaLink
     *
     * @return Uploadimage
     */
    public function setMediaLink($mediaLink)
    {
        $this->mediaLink = $mediaLink;

        return $this;
    }

    /**
     * Get mediaLink
     *
     * @return string
     */
    public function getMediaLink()
    {
        return $this->mediaLink;
    }
}
