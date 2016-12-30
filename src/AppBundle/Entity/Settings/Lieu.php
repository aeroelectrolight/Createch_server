<?php

namespace AppBundle\Entity\Settings;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Misd\PhoneNumberBundle\Validator\Constraints\PhoneNumber as AssertPhoneNumber;

/**
 * Lieu
 *
 * @ORM\Table(name="lieu")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Settings\LieuRepository")
 */
class Lieu
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
     *     message="Le nom du lieu ne peut pas contenir de nombre"
     * )
     * @Assert\Length(
     *      min = "4",
     *      max = "20",
     *      minMessage = "Le nom du lieu doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le nom du lieu ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=true)
     * @Assert\Range(
     *      min = 1,
     *      max = 3,
     *      minMessage = "Le temps maximum par jour ne peut être inférieur à {{ limit }} heures",
     *      maxMessage = "Le temps maximum par jour ne peut être supérieur à {{ limit }} heures"
     * )
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=255, nullable=true)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Le nom de la rue ne peut pas contenir de nombre"
     * )
     * @Assert\Length(
     *      min = "1",
     *      max = "20",
     *      minMessage = "Le nom de la rue doit contenir au moins {{ limit }} caractère",
     *      maxMessage = "Le nom de la rue ne peut pas contenir plus de {{ limit }} caractères"
     * )
     */
    private $rue;

    /**
     * @var string
     *
     * @ORM\Column(name="c_postal", type="string", length=50, nullable=true)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=true,
     *     message="Le code postal ne peut pas contenir de lettre"
     * )
     * @Assert\Length(
     *      min = 4,
     *      max = 7,
     *      minMessage = "Le code postal doit au minimum avoir {{ limit }} chiffres",
     *      maxMessage = "Le code postal doit au maximum avoir {{ limit }} chiffres"
     * )
     */
    private $cPostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=false)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Le nom de la ville ne peut pas contenir de nombre"
     * )
     * @Assert\Length(
     *      min = "1",
     *      max = "20",
     *      minMessage = "Le nom de la ville doit contenir au moins {{ limit }} caractère",
     *      maxMessage = "Le nom de la ville ne peut pas contenir plus de {{ limit }} caractères"
     * )
     */
    private $ville;

    /**
     * @var string
     * 
     * @ORM\Column(name="telephone", type="phone_number", nullable=true)
     * @AssertPhoneNumber(defaultRegion="FR",
     *      message = "Le numéro de téléphone n'est pas valide")
     */
    private $telephone;



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
     * @return Lieu
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
     * Set numero
     *
     * @param integer $numero
     * @return Lieu
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set rue
     *
     * @param string $rue
     * @return Lieu
     */
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get rue
     *
     * @return string 
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set cPostal
     *
     * @param integer $cPostal
     * @return Lieu
     */
    public function setCPostal($cPostal)
    {
        $this->cPostal = $cPostal;

        return $this;
    }

    /**
     * Get cPostal
     *
     * @return integer 
     */
    public function getCPostal()
    {
        return $this->cPostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Lieu
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return Lieu
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }
}
