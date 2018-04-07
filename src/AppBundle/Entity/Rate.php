<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rate
 *
 * @ORM\Table(name="rate", indexes={@ORM\Index(name="idUser", columns={"idUser"}), @ORM\Index(name="idTicket", columns={"idTicket"})})
 * @ORM\Entity
 */
class Rate
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idRate", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrate;

    /**
     * @var float
     *
     * @ORM\Column(name="nbrRate", type="float", precision=10, scale=0, nullable=false)
     */
    private $nbrrate;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $iduser;

    /**
     * @var \Ticket
     *
     * @ORM\ManyToOne(targetEntity="Ticket")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTicket", referencedColumnName="id_ticket")
     * })
     */
    private $idticket;


}

