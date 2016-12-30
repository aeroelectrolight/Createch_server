<?php

namespace AppBundle\Entity\Settings;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Convention
 *
 * @ORM\Table(name="convention")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Settings\ConventionRepository")
 */
class Convention
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Le nom de la convention ne peut pas contenir de nombre"
     * )
     * @Assert\Length(
     *      min = "4",
     *      max = "20",
     *      minMessage = "Le nom de la convention doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le nom de la convention ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="tpsMaxJ", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 4,
     *      max = 12,
     *      minMessage = "Le temps maximum par jour ne peut être inférieur à {{ limit }} heures",
     *      maxMessage = "Le temps maximum par jour ne peut être supérieur à {{ limit }} heures"
     * )
     */
    private $tpsMaxJ;

    /**
     * @var integer
     *
     * @ORM\Column(name="tpsMaxPeriode", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 1,
     *      max = 6,
     *      minMessage = "Le temps maximum par période ne peut être inférieur à {{ limit }} heure",
     *      maxMessage = "Le temps maximum par période ne peut être supérieur à {{ limit }} heures"
     * )
     */
    private $tpsMaxPeriode;

    /**
     * @var integer
     *
     * @ORM\Column(name="ampMaxJ", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 9,
     *      max = 15,
     *      minMessage = "L'amplitude maximum par jour ne peut être inférieur à {{ limit }} heure",
     *      maxMessage = "L'amplitude maximum par jour ne peut être supérieur à {{ limit }} heures"
     * )
     */
    private $ampMaxJ;

    /**
     * @var integer
     *
     * @ORM\Column(name="tpsMinJ", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 3,
     *      max = 6,
     *      minMessage = "Le temps minimum par jour ne peut être inférieur à {{ limit }} heures",
     *      maxMessage = "Le temps minimum par jour ne peut être supérieur à {{ limit }} heures"
     * )
     */
    private $tpsMinJ;

    /**
     * @var integer
     *
     * @ORM\Column(name="tpsMinInterPeriode", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 1,
     *      max = 4,
     *      minMessage = "Le temps minimum entre période ne peut être inférieur à {{ limit }} heure",
     *      maxMessage = "Le temps minimum entre période ne peut être supérieur à {{ limit }} heures"
     * )
     */
    private $tpsMinInterPeriode;

    /**
     * @var integer
     *
     * @ORM\Column(name="tpsMinRepo", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 11,
     *      max = 20,
     *      minMessage = "Le temps minimum de repos entre deux jours de travail ne peut être inférieur à {{ limit }} heures",
     *      maxMessage = "Le temps minimum de repos entre deux jours de travail ne peut être supérieur à {{ limit }} heures"
     * )
     */
    private $tpsMinRepo;

    /**
     * @var integer
     *
     * @ORM\Column(name="tpsMinRepoComp", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 9,
     *      max = 12,
     *      minMessage = "Le temps minimum de repos entre deux jours de travail avec compensation ne peut être inférieur à {{ limit }} heures",
     *      maxMessage = "Le temps minimum de repos entre deux jours de travail avec compensation ne peut être supérieur à {{ limit }} heures"
     * )
     */
    private $tpsMinRepoComp;

    /**
     * @var integer
     *
     * @ORM\Column(name="tpsMaxS", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 1,
     *      max = 48,
     *      minMessage = "Le temps maximum de travail par semaine ne peut être inférieur à {{ limit }} heure",
     *      maxMessage = "Le temps maximum de travail par semaine ne peut être supérieur à {{ limit }} heures"
     * )
     */
    private $tpsMaxS;

    /**
     * @var integer
     *
     * @ORM\Column(name="tpsMax2s", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 1,
     *      max = 44,
     *      minMessage = "Le temps maximum de travail par semaine sur 12 semaine consécutive ne peut être inférieur à {{ limit }} heure",
     *      maxMessage = "Le temps maximum de travail par semaine sur 12 semaine consécutive ne peut être supérieur à {{ limit }} heures"
     * )
     */
    private $tpsMax12s;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrJMaxConse", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 2,
     *      max = 6,
     *      minMessage = "Le nombre de jour de travail consécutif ne peut être inférieur à {{ limit }} jours",
     *      maxMessage = "Le nombre de jour de travail consécutif ne peut être supérieur à {{ limit }} jours"
     * )
     */
    private $nbrJMaxConse;

    /**
     * @var integer
     *
     * @ORM\Column(name="tpsRepoHebdo", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 24,
     *      max = 48,
     *      minMessage = "Le temps de repos hebdomadaire ne peut être inférieur à {{ limit }} heures",
     *      maxMessage = "Le temps de repos hebdomadaire ne peut être supérieur à {{ limit }} heures"
     * )
     */
    private $tpsRepoHebdo;



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
     * @return Convention
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
     * Set tpsMaxJ
     *
     * @param integer $tpsMaxJ
     * @return Convention
     */
    public function setTpsMaxJ($tpsMaxJ)
    {
        $this->tpsMaxJ = $tpsMaxJ;

        return $this;
    }

    /**
     * Get tpsMaxJ
     *
     * @return integer 
     */
    public function getTpsMaxJ()
    {
        return $this->tpsMaxJ;
    }

    /**
     * Set tpsMaxPeriode
     *
     * @param integer $tpsMaxPeriode
     * @return Convention
     */
    public function setTpsMaxPeriode($tpsMaxPeriode)
    {
        $this->tpsMaxPeriode = $tpsMaxPeriode;

        return $this;
    }

    /**
     * Get tpsMaxPeriode
     *
     * @return integer 
     */
    public function getTpsMaxPeriode()
    {
        return $this->tpsMaxPeriode;
    }

    /**
     * Set ampMaxJ
     *
     * @param integer $ampMaxJ
     * @return Convention
     */
    public function setAmpMaxJ($ampMaxJ)
    {
        $this->ampMaxJ = $ampMaxJ;

        return $this;
    }

    /**
     * Get ampMaxJ
     *
     * @return integer 
     */
    public function getAmpMaxJ()
    {
        return $this->ampMaxJ;
    }

    /**
     * Set tpsMinJ
     *
     * @param integer $tpsMinJ
     * @return Convention
     */
    public function setTpsMinJ($tpsMinJ)
    {
        $this->tpsMinJ = $tpsMinJ;

        return $this;
    }

    /**
     * Get tpsMinJ
     *
     * @return integer 
     */
    public function getTpsMinJ()
    {
        return $this->tpsMinJ;
    }

    /**
     * Set tpsMinInterPeriode
     *
     * @param integer $tpsMinInterPeriode
     * @return Convention
     */
    public function setTpsMinInterPeriode($tpsMinInterPeriode)
    {
        $this->tpsMinInterPeriode = $tpsMinInterPeriode;

        return $this;
    }

    /**
     * Get tpsMinInterPeriode
     *
     * @return integer 
     */
    public function getTpsMinInterPeriode()
    {
        return $this->tpsMinInterPeriode;
    }

    /**
     * Set tpsMinRepo
     *
     * @param integer $tpsMinRepo
     * @return Convention
     */
    public function setTpsMinRepo($tpsMinRepo)
    {
        $this->tpsMinRepo = $tpsMinRepo;

        return $this;
    }

    /**
     * Get tpsMinRepo
     *
     * @return integer 
     */
    public function getTpsMinRepo()
    {
        return $this->tpsMinRepo;
    }

    /**
     * Set tpsMinRepoComp
     *
     * @param integer $tpsMinRepoComp
     * @return Convention
     */
    public function setTpsMinRepoComp($tpsMinRepoComp)
    {
        $this->tpsMinRepoComp = $tpsMinRepoComp;

        return $this;
    }

    /**
     * Get tpsMinRepoComp
     *
     * @return integer 
     */
    public function getTpsMinRepoComp()
    {
        return $this->tpsMinRepoComp;
    }

    /**
     * Set tpsMaxS
     *
     * @param integer $tpsMaxS
     * @return Convention
     */
    public function setTpsMaxS($tpsMaxS)
    {
        $this->tpsMaxS = $tpsMaxS;

        return $this;
    }

    /**
     * Get tpsMaxS
     *
     * @return integer 
     */
    public function getTpsMaxS()
    {
        return $this->tpsMaxS;
    }

    /**
     * Set tpsMax12s
     *
     * @param integer $tpsMax12s
     * @return Convention
     */
    public function setTpsMax12s($tpsMax12s)
    {
        $this->tpsMax12s = $tpsMax12s;

        return $this;
    }

    /**
     * Get tpsMax12s
     *
     * @return integer 
     */
    public function getTpsMax12s()
    {
        return $this->tpsMax12s;
    }

    /**
     * Set nbrJMaxConse
     *
     * @param integer $nbrJMaxConse
     * @return Convention
     */
    public function setNbrJMaxConse($nbrJMaxConse)
    {
        $this->nbrJMaxConse = $nbrJMaxConse;

        return $this;
    }

    /**
     * Get nbrJMaxConse
     *
     * @return integer 
     */
    public function getNbrJMaxConse()
    {
        return $this->nbrJMaxConse;
    }

    /**
     * Set tpsRepoHebdo
     *
     * @param integer $tpsRepoHebdo
     * @return Convention
     */
    public function setTpsRepoHebdo($tpsRepoHebdo)
    {
        $this->tpsRepoHebdo = $tpsRepoHebdo;

        return $this;
    }

    /**
     * Get tpsRepoHebdo
     *
     * @return integer 
     */
    public function getTpsRepoHebdo()
    {
        return $this->tpsRepoHebdo;
    }
}
