<?php

namespace AppBundle\Entity\Settings;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Misd\PhoneNumberBundle\Validator\Constraints\PhoneNumber as AssertPhoneNumber;

/**
 * Personnel
 *
 * @ORM\Table(name="personnel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Settings\PersonnelRepository")
 * @UniqueEntity(fields="user", message="Ce pseudonyme existe déjà...")
 */
class Personnel
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
     * @ORM\Column(name="user", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "4",
     *      max = "20",
     *      minMessage = "Le pseudonyme doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le pseudonyme ne peut pas contenir plus de {{ limit }} caractères"
     * )
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Le nom ne peut pas contenir de nombre"
     * )
     * @Assert\Length(
     *      min = "4",
     *      max = "20",
     *      minMessage = "Le nom doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le nom ne peut pas pas contenir plus de {{ limit }} caractères"
     * )
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     * @Assert\NotBlank(
     *     message="Le prénom doit être rempli"
     * )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Le prénom ne peut pas contenir de nombre"
     * )
     * @Assert\Length(
     *      min = "4",
     *      max = "20",
     *      minMessage = "Le prénom doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le prénom ne peut pas pas contenir plus de {{ limit }} caractères"
     * )
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, nullable=true)
     * 
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255, nullable=false)
     */
    private $statut;

    /**
     * @var \Date
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_naissance", type="string", length=255, nullable=true)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Le lieu ne peut pas contenir de nombre"
     * )
     * @Assert\Length(
     *      min = "4",
     *      max = "20",
     *      minMessage = "Le lieu doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le lieu ne peut pas pas contenir plus de {{ limit }} caractères"
     * )
     */
    private $lieuNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="phone_number", nullable=true)
     */
    private $telephone;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=true)
     * @AssertPhoneNumber(defaultRegion="FR",
     *      message = "Le numéro de téléphone n'est pas valide")
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=255, nullable=true)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="La rue ne peut pas contenir de nombre"
     * )
     * @Assert\Length(
     *      min = "4",
     *      max = "20",
     *      minMessage = "La rue doit faire au moins {{ limit }} caractères",
     *      maxMessage = "La rue ne peut pas pas contenir plus de {{ limit }} caractères"
     * )
     */
    private $rue;

    /**
     * @var string
     *
     * @ORM\Column(name="c_postal", type="string", length=50, nullable=true)
     * 
     */
    private $cPostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Settings\Convention")
     * 
     * @ORM\JoinColumn(nullable=false)
     */
    private $convention;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_secu", type="integer", nullable=true)
     */
    private $numSecu;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_conge", type="integer", nullable=true)
     */
    private $numConge;

    /**
     * @var integer
     *
     * @ORM\Column(name="rib", type="integer", nullable=true)
     */
    private $rib;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_heure_sup", type="integer", nullable=true)
     */
    private $totalHeureSup;


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
     * Constructor
     */
    public function __construct()
    {
    }

    /**
     * Set user
     *
     * @param string $user
     * @return Personnel
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Personnel
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
     * Set prenom
     *
     * @param string $prenom
     * @return Personnel
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Personnel
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set statut
     *
     * @param string $statut
     * @return Personnel
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return Personnel
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set lieuNaissance
     *
     * @param string $lieuNaissance
     * @return Personnel
     */
    public function setLieuNaissance($lieuNaissance)
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    /**
     * Get lieuNaissance
     *
     * @return string 
     */
    public function getLieuNaissance()
    {
        return $this->lieuNaissance;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Personnel
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return Personnel
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
     * @return Personnel
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
     * @return Personnel
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
     * @return Personnel
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
     * Set numSecu
     *
     * @param integer $numSecu
     * @return Personnel
     */
    public function setNumSecu($numSecu)
    {
        $this->numSecu = $numSecu;

        return $this;
    }

    /**
     * Get numSecu
     *
     * @return integer 
     */
    public function getNumSecu()
    {
        return $this->numSecu;
    }

    /**
     * Set numConge
     *
     * @param integer $numConge
     * @return Personnel
     */
    public function setNumConge($numConge)
    {
        $this->numConge = $numConge;

        return $this;
    }

    /**
     * Get numConge
     *
     * @return integer 
     */
    public function getNumConge()
    {
        return $this->numConge;
    }

    /**
     * Set rib
     *
     * @param integer $rib
     * @return Personnel
     */
    public function setRib($rib)
    {
        $this->rib = $rib;

        return $this;
    }

    /**
     * Get rib
     *
     * @return integer 
     */
    public function getRib()
    {
        return $this->rib;
    }

    /**
     * Set totalHeureSup
     *
     * @param integer $totalHeureSup
     * @return Personnel
     */
    public function setTotalHeureSup($totalHeureSup)
    {
        $this->totalHeureSup = $totalHeureSup;

        return $this;
    }

    /**
     * Get totalHeureSup
     *
     * @return integer 
     */
    public function getTotalHeureSup()
    {
        return $this->totalHeureSup;
    }



    /**
     * Set convention
     *
     * @param \AppBundle\Entity\Settings\Convention $convention
     * @return Personnel
     */
    public function setConvention(\AppBundle\Entity\Settings\Convention $convention)
    {
        $this->convention = $convention;

        return $this;
    }

    /**
     * Get convention
     *
     * @return \AppBundle\Entity\Settings\Convention 
     */
    public function getConvention()
    {
        return $this->convention;
    }
}
