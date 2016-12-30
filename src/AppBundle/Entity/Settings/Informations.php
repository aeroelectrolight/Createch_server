<?php

namespace AppBundle\Entity\Settings;

use Doctrine\ORM\Mapping as ORM;

/**
 * Informations
 *
 * @ORM\Table(name="informations")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Settings\InformationsRepository")
 */
class Informations
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
     * @var \DateTime
     *
     * @ORM\Column(name="timeClockIn", type="datetime", unique=true)
     */
    private $timeClockIn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timeClockOut", type="datetime", unique=true)
     */
    private $timeClockOut;


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
     * Set timeClockIn
     *
     * @param \DateTime $timeClockIn
     *
     * @return Informations
     */
    public function setTimeClockIn($timeClockIn)
    {
        $this->timeClockIn = $timeClockIn;

        return $this;
    }

    /**
     * Get timeClockIn
     *
     * @return \DateTime
     */
    public function getTimeClockIn()
    {
        return $this->timeClockIn;
    }

    /**
     * Set timeClockOut
     *
     * @param \DateTime $timeClockOut
     *
     * @return Informations
     */
    public function setTimeClockOut($timeClockOut)
    {
        $this->timeClockOut = $timeClockOut;

        return $this;
    }

    /**
     * Get timeClockOut
     *
     * @return \DateTime
     */
    public function getTimeClockOut()
    {
        return $this->timeClockOut;
    }
}

