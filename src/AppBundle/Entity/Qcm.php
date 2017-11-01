<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Qcm
 *
 * @ORM\Table(name="qcm")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QcmRepository")
 */
class Qcm
{
    public function __construct()
    {
        $this->creationDate = new \DateTime();
        $this->dateDebut = new \DateTime();
        $this->dateFin = new \DateTime('+1 month');
    }

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
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="datetime")
     * @Assert\Expression("this.getDateFin() > this.getDateDebut()",message="La date de fin doit etre superieure à la date de début")
     */
    private $dateFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pharmacie")
     * @ORM\JoinColumn(name="pharmacie_id", referencedColumnName="id")
     */

    private $pharmacie;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PharmacieGroupe")
     * @ORM\JoinColumn(name="pharmacie_groupe_id", referencedColumnName="id")
     */

    private $pharmacieGroupe;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Question",mappedBy="qcm")
     */

    private $questions;

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
     * @return Qcm
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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Qcm
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
     * @param \DateTime $dateFin
     *
     * @return Qcm
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
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
     * @return Qcm
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
     * Set pharmacie
     *
     * @param \AppBundle\Entity\Pharmacie $pharmacie
     *
     * @return Qcm
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
     * Add question
     *
     * @param \AppBundle\Entity\Question $question
     *
     * @return Qcm
     */
    public function addQuestion(\AppBundle\Entity\Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \AppBundle\Entity\Question $question
     */
    public function removeQuestion(\AppBundle\Entity\Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    public function __toString()
    {
        return $this->getTitre()? $this->getTitre() : '';
    }

    /**
     * Set pharmacieGroupe
     *
     * @param \AppBundle\Entity\PharmacieGroupe $pharmacieGroupe
     *
     * @return Qcm
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
}
