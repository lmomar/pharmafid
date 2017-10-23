<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Pharmacie
 *
 * @ORM\Table(name="pharmacie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PharmacieRepository")
 * @Vich\Uploadable()
 */
class Pharmacie
{
    public function __construct()
    {
        $this->created = new \DateTime();
    }
    const UPLOADS_PATH = '/uploads/pharmacies';

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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;


    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PharmacieGroupe")
     * @ORM\JoinColumn(name="groupe_id", referencedColumnName="id")
     */
    private $pharmacieGroupe;


    /**
     * @var string
     * @ORM\Column(name="image",type="string")
     */
    private $image;


    /**
     * @Vich\UploadableField(mapping="pharmacie_image",fileNameProperty="image")
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
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Pharmacie
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
     * Set adresse
     *
     * @param string $adresse
     * @return Pharmacie
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }



    /**
     * Set ville
     *
     * @param string $ville
     * @return Pharmacie
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
     * Set created
     *
     * @param \DateTime $created
     * @return Pharmacie
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set pharmacieGroupe
     *
     * @param \AppBundle\Entity\PharmacieGroupe $pharmacieGroupe
     *
     * @return Pharmacie
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
        return $this->getNom() ? $this->getNom() : '';
    }


    

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Pharmacie
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
}
