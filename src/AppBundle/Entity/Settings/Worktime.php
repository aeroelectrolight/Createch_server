<?php

namespace AppBundle\Entity\Settings;

use Doctrine\ORM\Mapping as ORM;

/**
 * Worktime
 *
 * @ORM\Table(name="worktime")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Settings\WorktimeRepository")
 */
class Worktime
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
     * @ORM\Column(name="timeclock", type="datetime", unique=true)
     */
    private $timeclock;

    /**
     * @var string
     *
     * @ORM\Column(name="direction", type="string", length=255)
     */
    private $direction;


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
     * Set timeclock
     *
     * @param \DateTime $timeclock
     *
     * @return Worktime
     */
    public function setTimeclock($timeclock)
    {
        $this->timeclock = $timeclock;

        return $this;
    }

    /**
     * Get timeclock
     *
     * @return \DateTime
     */
    public function getTimeclock()
    {
        return $this->timeclock;
    }

    /**
     * Set direction
     *
     * @param string $direction
     *
     * @return Worktime
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * Get direction
     *
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }
}

