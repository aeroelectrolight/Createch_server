<?php

namespace AppBundle\Entity\Settings;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Groupe
 *
 * @ORM\Table(name="groupe")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Settings\GroupeRepository")
 */
class Groupe
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
     * @Assert\NotBlank(
     *      message = "Le nom du groupe ne doit pas être vide")
     * @Assert\Length(
     *      min = "4",
     *      max = "20",
     *      minMessage = "Le nom du groupe doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le nom du groupe ne peut pas contenir plus de {{ limit }} caractères"
     * )
     */
    private $title;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Settings\Fonction", cascade={"persist"})
     * @Assert\NotBlank(
     *      message = "Les fonnctions du groupe ne doit pas être vide")
     */
    private $fonctions;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Settings\Couleur")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(
     *      message = "La couleur du groupe ne doit pas être vide")
     */
    private $couleur;



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
     * @return Groupe
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
     * Constructor
     */
    public function __construct()
    {
        $this->fonctions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add fonctions
     *
     * @param \AppBundle\Entity\Settings\Fonction $fonctions
     * @return Groupe
     */
    public function addFonction(\AppBundle\Entity\Settings\Fonction $fonctions)
    {
        $this->fonctions[] = $fonctions;

        return $this;
    }

    /**
     * Remove fonctions
     *
     * @param \AppBundle\Entity\Settings\Fonction $fonctions
     */
    public function removeFonction(\AppBundle\Entity\Settings\Fonction $fonctions)
    {
        $this->fonctions->removeElement($fonctions);
    }

    /**
     * Get fonctions
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getFonctions()
    {
        return $this->fonctions;
    }

    /**
     * Set couleur
     *
     * @param \AppBundle\Entity\Settings\Couleur $couleur
     * @return Groupe
     */
    public function setCouleur(\AppBundle\Entity\Settings\Couleur $couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return \AppBundle\Entity\Settings\Couleur
     */
    public function getCouleur()
    {
        return $this->couleur;
    }
}
