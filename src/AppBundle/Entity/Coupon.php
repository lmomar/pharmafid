<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Coupon
 *
 * @ORM\Table(name="coupon")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CouponRepository")
 * @Vich\Uploadable()
 */
class Coupon
{
    public function __construct()
    {
        $this->creationDate = new \DateTime();
        $this->dateDebut = new \DateTime();
        $this->dateFin = new \DateTime('+1 month');
    }
    const UPLOADS_PATH = '/uploads/coupons';

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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=255)
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="dateFin", type="datetime")
     */
    private $dateFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="remise", type="string", length=255,nullable=true)
     */
    private $remise;

    /**
     * @var string
     *
     * @ORM\Column(name="lacondition", type="string", length=255,nullable=true)
     */
    private $lacondition;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pharmacie")
     * @ORM\JoinColumn(name="pharmacie_id",referencedColumnName="id")
     */
    private $pharmacie;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PharmacieGroupe")
     * @ORM\JoinColumn(name="groupe_id",referencedColumnName="id")
     */
    private $pharmacieGroupe;

    /**
     * @Vich\UploadableField(mapping="coupon_image",fileNameProperty="image")
     */
    private $imageFile;

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Coupon
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Coupon
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Coupon
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Coupon
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Coupon
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param string $dateFin
     *
     * @return Coupon
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return string
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Coupon
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set remise
     *
     * @param string $remise
     *
     * @return Coupon
     */
    public function setRemise($remise)
    {
        $this->remise = $remise;

        return $this;
    }

    /**
     * Get remise
     *
     * @return string
     */
    public function getRemise()
    {
        return $this->remise;
    }

    /**
     * Set lacondition
     *
     * @param string $lacondition
     *
     * @return Coupon
     */
    public function setLacondition($lacondition)
    {
        $this->lacondition = $lacondition;

        return $this;
    }

    /**
     * Get lacondition
     *
     * @return string
     */
    public function getLacondition()
    {
        return $this->lacondition;
    }

    /**
     * Set pharmacie
     *
     * @param \AppBundle\Entity\Pharmacie $pharmacie
     *
     * @return Coupon
     */
    public function setPharmacie(\AppBundle\Entity\Pharmacie $pharmacie = null)
    {
        $this->pharmacie = $pharmacie;

        return $this;
    }

    /**
     * Get pharmacie
     *
     * @return \AppBundle\Entity\Pharmacie
     */
    public function getPharmacie()
    {
        return $this->pharmacie;
    }

    /**
     * Set pharmacieGroupe
     *
     * @param \AppBundle\Entity\PharmacieGroupe $pharmacieGroupe
     *
     * @return Coupon
     */
    public function setPharmacieGroupe(\AppBundle\Entity\PharmacieGroupe $pharmacieGroupe = null)
    {
        $this->pharmacieGroupe = $pharmacieGroupe;

        return $this;
    }

    /**
     * Get pharmacieGroupe
     *
     * @return \AppBundle\Entity\PharmacieGroupe
     */
    public function getPharmacieGroupe()
    {
        return $this->pharmacieGroupe;
    }

    public function __toString()
    {
        return (string) $this->getTitre();
    }
}
