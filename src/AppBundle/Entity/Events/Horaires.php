<?php

namespace AppBundle\Entity\Events;

use Doctrine\ORM\Mapping as ORM;

/**
 * HoraireEvents
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Events\HoraireEventsRepository")
 */
class Horaires
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="personne", type="string", length=255)
     */
    private $personne;

    /**
     * @var string
     *
     * @ORM\Column(name="transport", type="string", length=255)
     */
    private $transport;
    
    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaire", type="time")
     */
    private $horaire;
    
     /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Events\Events", inversedBy="horaires")
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
     * Set type
     *
     * @param string $type
     * @return Horaires
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set personne
     *
     * @param string $personne
     * @return Horaires
     */
    public function setPersonne($personne)
    {
        $this->personne = $personne;

        return $this;
    }

    /**
     * Get personne
     *
     * @return string
     */
    public function getPersonne()
    {
        return $this->personne;
    }

    /**
     * Set transport
     *
     * @param string $transport
     * @return Horaires
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;

        return $this;
    }

    /**
     * Get transport
     *
     * @return string
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * Set horaire
     *
     * @param \DateTime $horaire
     * @return HoraireEvents
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
     * @return Horaires
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

    /**
     * Set lieu
     *
     * @param string $lieu
     * @return Horaires
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }
}
