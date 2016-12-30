<?php
namespace AppBundle\Entity\Settings;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Couleur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Settings\CouleurRepository")
 */
class Couleur
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
     * @Assert\NotBlank(
     *      message = "Le nom de la couleur ne doit pas être vide")
     * @Assert\Length(
     *      min = "4",
     *      max = "20",
     *      minMessage = "Le nom de la couleur doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le nom de la couleur ne peut pas contenir plus de {{ limit }} caractères"
     * )
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=255)
     * @Assert\NotBlank()
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
     * @return Couleur
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
     * Set couleur
     *
     * @param string $couleur
     * @return Couleur
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string 
     */
    public function getCouleur()
    {
        return $this->couleur;
    }
}
