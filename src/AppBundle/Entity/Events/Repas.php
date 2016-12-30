<?php

namespace AppBundle\Entity\Events;

use Doctrine\ORM\Mapping as ORM;

/**
 * Repas
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Events\RepasRepository")
 */
class Repas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombre", type="integer")
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaire", type="time")
     */
    private $horaire;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Events\Events", inversedBy="repas")
     *
     * @ORM\JoinColumn(nullable=false)
     */
    private $events;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Repas
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set nombre
     *
     * @param integer $nombre
     * @return Repas
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return integer
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set horaire
     *
     * @param \DateTime $horaire
     * @return Repas
     */
    public function setHoraire($horaire)
    {
        $this->horaire = $horaire;

        return $this;
    }

    /**
     * Get horaire
     *
     * @return \DateTime
     */
    public function getHoraire()
    {
        return $this->horaire;
    }

    /**
     * Set events
     *
     * @param \AppBundle\Entity\Events\Events $events
     * @return Repas
     */
    public function setEvents(\AppBundle\Entity\Events\Events $events)
    {
        $this->events = $events;

        return $this;
    }

    /**
     * Get events
     *
     * @return \AppBundle\Entity\Events\Events
     */
    public function getEvents()
    {
        return $this->events;
    }
}
