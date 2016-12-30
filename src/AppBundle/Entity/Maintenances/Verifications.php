<?php

namespace AppBundle\Entity\Maintenances;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Verification
 *
 * @ORM\Table(name="verifications")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Maintenances\VerificationsRepository")
 */
class Verifications
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
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=255)
     * @Assert\NotBlank(
     *      message="La désignation ne peut pas être vide"
     * )
     * @Assert\Length(
     *      min = "4",
     *      max = "80",
     *      minMessage = "La designation de la vérification doit faire au moins {{ limit }} caractères",
     *      maxMessage = "La désignation ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $designation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastVisite", type="date")
     */
    private $lastVisite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="nextVisite", type="date")
     */
    private $nextVisite;

    /**
     * @var string
     *
     * @ORM\Column(name="organism", type="string", length=255, nullable=true)
     */
    private $organism;

    /**
     * @var int
     *
     * @ORM\Column(name="periodicity", type="integer")
     * @Assert\NotBlank(
     *      message="La période ne peut pas être vide"
     * )
     */
    private $periodicity;

    /**
     * @var int
     *
     * @ORM\Column(name="alertDelay", type="integer")
     * @Assert\NotBlank(
     *      message="Le délai d'alerte ne peut pas être vide"
     * )
     */
    private $alertDelay;


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
     * Set designation
     *
     * @param string $designation
     *
     * @return Verification
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set lastVisite
     *
     * @param \DateTime $lastVisite
     *
     * @return Verification
     */
    public function setLastVisite($lastVisite)
    {
        $this->lastVisite = $lastVisite;

        return $this;
    }

    /**
     * Get lastVisite
     *
     * @return \DateTime
     */
    public function getLastVisite()
    {
        return $this->lastVisite;
    }

    /**
     * Set nextVisite
     *
     * @param \DateTime $nextVisite
     *
     * @return Verification
     */
    public function setNextVisite($nextVisite)
    {
        $this->nextVisite = $nextVisite;

        return $this;
    }

    /**
     * Get nextVisite
     *
     * @return \DateTime
     */
    public function getNextVisite()
    {
        return $this->nextVisite;
    }

    /**
     * Set organism
     *
     * @param string $organism
     *
     * @return Verification
     */
    public function setOrganism($organism)
    {
        $this->organism = $organism;

        return $this;
    }

    /**
     * Get organism
     *
     * @return string
     */
    public function getOrganism()
    {
        return $this->organism;
    }

    /**
     * Set alertDelay
     *
     * @param integer $alertDelay
     *
     * @return Verification
     */
    public function setAlertDelay($alertDelay)
    {
        $this->alertDelay = $alertDelay;

        return $this;
    }

    /**
     * Get alertDelay
     *
     * @return int
     */
    public function getAlertDelay()
    {
        return $this->alertDelay;
    }

    /**
     * Set periodicity
     *
     * @param integer $periodicity
     *
     * @return Verification
     */
    public function setPeriodicity($periodicity)
    {
        $this->periodicity = $periodicity;

        return $this;
    }

    /**
     * Get periodicity
     *
     * @return int
     */
    public function getPeriodicity()
    {
        return $this->periodicity;
    }
}

