<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 *
 * @ORM\Table(name="reponse")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReponseRepository")
 */
class Reponse
{
    public function __construct()
    {
        $this->creationDate = new \DateTime();
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
     * @ORM\Column(name="valeur", type="string", length=255)
     */
    private $valeur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Question",inversedBy="reponse")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     */

    private $question;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Question")
     * @ORM\JoinColumn(name="question_suivante_id", referencedColumnName="id")
     */

    private $questionSuivante;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Reponse",inversedBy="childs")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parentReponse;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reponse",mappedBy="parentReponse",cascade={"persist"})
     */
    private $childs;


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
     * Set valeur
     *
     * @param string $valeur
     *
     * @return Reponse
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return string
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Reponse
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
     * Set question
     *
     * @param \AppBundle\Entity\Question $question
     *
     * @return Reponse
     */
    public function setQuestion(\AppBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \AppBundle\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set questionSuivante
     *
     * @param \AppBundle\Entity\Question $questionSuivante
     *
     * @return Reponse
     */
    public function setQuestionSuivante(\AppBundle\Entity\Question $questionSuivante = null)
    {
        $this->questionSuivante = $questionSuivante;

        return $this;
    }

    /**
     * Get questionSuivante
     *
     * @return \AppBundle\Entity\Question
     */
    public function getQuestionSuivante()
    {
        return $this->questionSuivante;
    }

    /**
     * Set parentReponse
     *
     * @param \AppBundle\Entity\Reponse $parentReponse
     *
     * @return Reponse
     */
    public function setParentReponse(\AppBundle\Entity\Reponse $parentReponse = null)
    {
        $this->parentReponse = $parentReponse;

        return $this;
    }

    /**
     * Get parentReponse
     *
     * @return \AppBundle\Entity\Reponse
     */
    public function getParentReponse()
    {
        return $this->parentReponse;
    }

    /**
     * Add child
     *
     * @param \AppBundle\Entity\Reponse $child
     *
     * @return Reponse
     */
    public function addChild(\AppBundle\Entity\Reponse $child)
    {
        $child->setParentReponse($this);
        $this->childs[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \AppBundle\Entity\Reponse $child
     */
    public function removeChild(\AppBundle\Entity\Reponse $child)
    {
        $this->childs->removeElement($child);
    }

    /**
     * Get childs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChilds()
    {
        return $this->childs;
    }

    public function __toString()
    {
        return $this->getValeur();
    }
}
