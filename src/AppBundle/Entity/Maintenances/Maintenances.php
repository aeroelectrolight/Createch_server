<?php

namespace AppBundle\Entity\Maintenances;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Maintenances
 *
 * @ORM\Table(name="maintenances")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Maintenances\MaintenancesRepository")
 */
class Maintenances
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
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank(
     *      message="Le titre ne peut pas être vide"
     * )
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOrigin", type="datetime")
     */
    private $dateOrigin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateVisit", type="datetime")
     */
    private $dateVisit;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateWork", type="datetime")
     */
    private $dateWork;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateResolved", type="datetime")
     */
    private $dateResolved;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Assert\NotBlank(
     *      message="La description ne peut pas être vide"
     * )
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;


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
     * Set title
     *
     * @param string $title
     *
     * @return Maintenances
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
     * Set dateOrigin
     *
     * @param \DateTime $dateOrigin
     *
     * @return Maintenances
     */
    public function setDateOrigin($dateOrigin)
    {
        $this->dateOrigin = $dateOrigin;

        return $this;
    }

    /**
     * Get dateOrigin
     *
     * @return \DateTime
     */
    public function getDateOrigin()
    {
        return $this->dateOrigin;
    }

    /**
     * Set dateWork
     *
     * @param \DateTime $dateWork
     *
     * @return Maintenances
     */
    public function setDateWork($dateWork)
    {
        $this->dateWork = $dateWork;

        return $this;
    }

    /**
     * Get dateWork
     *
     * @return \DateTime
     */
    public function getDateWork()
    {
        return $this->dateWork;
    }

    /**
     * Set dateResolved
     *
     * @param \DateTime $dateResolved
     *
     * @return Maintenances
     */
    public function setDateResolved($dateResolved)
    {
        $this->dateResolved = $dateResolved;

        return $this;
    }

    /**
     * Get dateResolved
     *
     * @return \DateTime
     */
    public function getDateResolved()
    {
        return $this->dateResolved;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Maintenances
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Maintenances
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set dateVisit
     *
     * @param \DateTime $dateVisit
     *
     * @return Maintenances
     */
    public function setDateVisit($dateVisit)
    {
        $this->dateVisit = $dateVisit;

        return $this;
    }

    /**
     * Get dateVisit
     *
     * @return \DateTime
     */
    public function getDateVisit()
    {
        return $this->dateVisit;
    }
}
