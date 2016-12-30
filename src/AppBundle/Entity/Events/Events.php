<?php

namespace AppBundle\Entity\Events;

use Doctrine\ORM\Mapping as ORM;

/**
 * Events
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Events\EventsRepository")
 */
class Events
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Settings\Couleur")
     *
     * @ORM\JoinColumn(nullable=false)
     */
    private $bgColor;

    /**
     * @var string
     *
     * @ORM\Column(name="fgColor", type="string", length=255, nullable=true)
     */
    private $fgColor;

    /**
     * @var string
     *
     * @ORM\Column(name="cssClass", type="string", length=255, nullable=true)
     */
    private $cssClass;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDatetime", type="datetime")
     */
    private $startDatetime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDatetime", type="datetime")
     */
    private $endDatetime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allDay", type="boolean")
     */
    private $allDay;
    
    /**
     * @var textarea
     *
     * @ORM\Column(name="planning", type="text", nullable=true)
     */
    private $planning;
    
    /**
     * @var textarea
     *
     * @ORM\Column(name="divers", type="text", nullable=true)
     */
    private $divers;
    
     /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Settings\Lieu")
     *
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieu;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Events\Coordonnees", mappedBy="events", cascade={"persist"})
     * 
     */
    private $coordonnees;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Events\Horaires", mappedBy="events", cascade={"persist"})
     */
    private $horaires;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Events\Repas", mappedBy="events", cascade={"persist"})
     */
    private $repas;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Events\Budgets",mappedBy="events",cascade={"persist"})
     */
    private $budgets;

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
     * @return Events
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
     * Set bgColor
     *
     * @param \AppBundle\Entity\Settings\Couleur $bgColor
     * @return Events
     */
    public function setBgColor(\AppBundle\Entity\Settings\couleur $bgColor)
    {
        $this->bgColor = $bgColor;

        return $this;
    }

    /**
     * Get bgColor
     *
     * @return \AppBundle\Entity\Settings\Couleur
     */
    public function getBgColor()
    {
        return $this->bgColor;
    }
    
    /**
     * Set fgColor
     *
     * @param string $fgColor
     * @return Events
     */
    public function setFgColor($fgColor)
    {
        $this->fgColor = $fgColor;

        return $this;
    }

    /**
     * Get fgColor
     *
     * @return string 
     */
    public function getFgColor()
    {
        return $this->fgColor;
    }

    /**
     * Set cssClass
     *
     * @param string $cssClass
     * @return Events
     */
    public function setCssClass($cssClass)
    {
        $this->cssClass = $cssClass;

        return $this;
    }

    /**
     * Get cssClass
     *
     * @return string 
     */
    public function getCssClass()
    {
        return $this->cssClass;
    }

    /**
     * Set startDatetime
     *
     * @param \DateTime $startDatetime
     * @return Events
     */
    public function setStartDatetime($startDatetime)
    {
        $this->startDatetime = $startDatetime;

        return $this;
    }

    /**
     * Get startDatetime
     *
     * @return \DateTime 
     */
    public function getStartDatetime()
    {
        return $this->startDatetime;
    }

    /**
     * Set endDatetime
     *
     * @param \DateTime $endDatetime
     * @return Events
     */
    public function setEndDatetime($endDatetime)
    {
        $this->endDatetime = $endDatetime;

        return $this;
    }

    /**
     * Get endDatetime
     *
     * @return \DateTime 
     */
    public function getEndDatetime()
    {
        return $this->endDatetime;
    }

    /**
     * Set allDay
     *
     * @param boolean $allDay
     * @return Events
     */
    public function setAllDay($allDay)
    {
        $this->allDay = $allDay;

        return $this;
    }

    /**
     * Get allDay
     *
     * @return boolean 
     */
    public function getAllDay()
    {
        return $this->allDay;
    }
    

    /**
     * Set planning
     *
     * @param string $planning
     * @return Events
     */
    public function setPlanning($planning)
    {
        $this->planning = $planning;

        return $this;
    }

    /**
     * Get planning
     *
     * @return string
     */
    public function getPlanning()
    {
        return $this->planning;
    }

    /**
     * Set divers
     *
     * @param string $divers
     * @return Events
     */
    public function setDivers($divers)
    {
        $this->divers = $divers;

        return $this;
    }

    /**
     * Get divers
     *
     * @return string 
     */
    public function getDivers()
    {
        return $this->divers;
    }

    /**
     * Set lieu
     *
     * @param \AppBundle\Entity\Settings\Lieu $lieu
     * @return Events
     */
    public function setLieu(\AppBundle\Entity\Settings\Lieu $lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return \AppBundle\Entity\Settings\Lieu
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Add coordonnees
     *
     * @param \AppBundle\Entity\Events\Coordonnees $coordonnees
     * @return Events
     */
    public function addCoordonnee(\AppBundle\Entity\Events\Coordonnees $coordonnees)
    {
        $coordonnees->setEvents($this);
        $this->coordonnees[] = $coordonnees;

        return $this;
    }

    /**
     * Remove coordonnees
     *
     * @param \AppBundle\Entity\Events\Coordonnees $coordonnees
     */
    public function removeCoordonnee(\AppBundle\Entity\Events\Coordonnees $coordonnees)
    {
        $this->coordonnees->removeElement($coordonnees);
    }

    /**
     * Get coordonnees
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCoordonnees()
    {
        return $this->coordonnees;
    }

    /**
     * Add horaires
     *
     * @param \AppBundle\Entity\Events\Horaires $horaires
     * @return Events
     */
    public function addHoraire(\AppBundle\Entity\Events\Horaires $horaires)
    {
        $horaires->setEvents($this);
        $this->horaires[] = $horaires;

        return $this;
    }

    /**
     * Remove horaires
     *
     * @param \AppBundle\Entity\Events\Horaires $horaires
     */
    public function removeHoraire(\AppBundle\Entity\Events\Horaires $horaires)
    {
        $this->horaires->removeElement($horaires);
    }

    /**
     * Get horaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHoraires()
    {
        return $this->horaires;
    }

    /**
     * Add repas
     *
     * @param \AppBundle\Entity\Events\Repas $repas
     * @return Events
     */
    public function addRepa(\AppBundle\Entity\Events\Repas $repas)
    {
        $repas->setEvents($this);
        $this->repas[] = $repas;

        return $this;
    }

    /**
     * Remove repas
     *
     * @param \AppBundle\Entity\Events\Repas $repas
     */
    public function removeRepa(\AppBundle\Entity\Events\Repas $repas)
    {
        $this->repas->removeElement($repas);
    }

    /**
     * Get repas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRepas()
    {
        return $this->repas;
    }

    /**
     * Add budgets
     *
     * @param \AppBundle\Entity\Events\Budgets $budgets
     * @return Events
     */
    public function addBudget(\AppBundle\Entity\Events\Budgets $budgets)
    {
        $budgets->setEvents($this);
        $this->budgets[] = $budgets;

        return $this;
    }

    /**
     * Remove budgets
     *
     * @param \AppBundle\Entity\Events\Budgets $budgets
     */
    public function removeBudget(\AppBundle\Entity\Events\Budgets $budgets)
    {
        $this->budgets->removeElement($budgets);
    }

    /**
     * Get budgets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBudgets()
    {
        return $this->budgets;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fgColor = '#FFFFFF';
        $this->cssClass = "event";
        $this->coordonnees = new \Doctrine\Common\Collections\ArrayCollection();
        $this->horaires = new \Doctrine\Common\Collections\ArrayCollection();
        $this->repas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->budgets = new \Doctrine\Common\Collections\ArrayCollection();
    }
}
