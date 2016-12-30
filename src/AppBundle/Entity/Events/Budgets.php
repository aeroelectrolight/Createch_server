<?php

namespace AppBundle\Entity\Events;

use Doctrine\ORM\Mapping as ORM;

/**
 * Budgets
 *
 * @ORM\Table(name="budgets")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Events\BudgetsRepository")
 */
class Budgets
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="compte", type="integer")
     */
    private $compte;

    /**
     * @var string
     *
     * @ORM\Column(name="nature", type="string", length=255)
     */
    private $nature;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="text")
     */
    private $detail;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tarifh", type="float", nullable=true)
     */
    private $tarifh;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="estimatedHours", type="integer", nullable=true)
     */
    private $estimatedHours;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="realHours", type="integer", nullable=true)
     */
    private $realHours;

    /**
     * @var float
     *
     * @ORM\Column(name="provisionalAmount", type="float")
     */
    private $provisionalAmount;

    /**
     * @var float
     *
     * @ORM\Column(name="realAmount", type="float", nullable=true)
     */
    private $realAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100, nullable=true)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Events\Events", inversedBy="budgets")
     *
     * @ORM\JoinColumn(nullable=false)
     */
    private $events;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set compte
     *
     * @param integer $compte
     *
     * @return Budgets
     */
    public function setCompte($compte)
    {
        $this->compte = $compte;

        return $this;
    }

    /**
     * Get compte
     *
     * @return integer
     */
    public function getCompte()
    {
        return $this->compte;
    }

    /**
     * Set nature
     *
     * @param string $nature
     *
     * @return Budgets
     */
    public function setNature($nature)
    {
        $this->nature = $nature;

        return $this;
    }

    /**
     * Get nature
     *
     * @return string
     */
    public function getNature()
    {
        return $this->nature;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Budgets
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set detail
     *
     * @param string $detail
     *
     * @return Budgets
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set tarifh
     *
     * @param float $tarifh
     *
     * @return Budgets
     */
    public function setTarifh($tarifh)
    {
        $this->tarifh = $tarifh;

        return $this;
    }

    /**
     * Get tarifh
     *
     * @return float
     */
    public function getTarifh()
    {
        return $this->tarifh;
    }

    /**
     * Set estimatedHours
     *
     * @param integer $estimatedHours
     *
     * @return Budgets
     */
    public function setEstimatedHours($estimatedHours)
    {
        $this->estimatedHours = $estimatedHours;

        return $this;
    }

    /**
     * Get estimatedHours
     *
     * @return integer
     */
    public function getEstimatedHours()
    {
        return $this->estimatedHours;
    }

    /**
     * Set realHours
     *
     * @param integer $realHours
     *
     * @return Budgets
     */
    public function setRealHours($realHours)
    {
        $this->realHours = $realHours;

        return $this;
    }

    /**
     * Get realHours
     *
     * @return integer
     */
    public function getRealHours()
    {
        return $this->realHours;
    }

    /**
     * Set provisionalAmount
     *
     * @param float $provisionalAmount
     *
     * @return Budgets
     */
    public function setProvisionalAmount($provisionalAmount)
    {
        $this->provisionalAmount = $provisionalAmount;

        return $this;
    }

    /**
     * Get provisionalAmount
     *
     * @return float
     */
    public function getProvisionalAmount()
    {
        return $this->provisionalAmount;
    }

    /**
     * Set realAmount
     *
     * @param float $realAmount
     *
     * @return Budgets
     */
    public function setRealAmount($realAmount)
    {
        $this->realAmount = $realAmount;

        return $this;
    }

    /**
     * Get realAmount
     *
     * @return float
     */
    public function getRealAmount()
    {
        return $this->realAmount;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Budgets
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
     * Set events
     *
     * @param \AppBundle\Entity\Events\Events $events
     *
     * @return Budgets
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
