<<<<<<< HEAD
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="question", type="string", length=255)
     */
    private $question;

    /**
     * @var bool
     *
     * @ORM\Column(name="isFirst", type="boolean")
     */
    private $isFirst;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Qcm",inversedBy="questions")
     * @ORM\JoinColumn(name="qcm_id", referencedColumnName="id")
     */

    private $qcm;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reponse",mappedBy="question",cascade={"persist","remove"})
     */
    private $reponse;

    private $countReponses;

    /**
     * @return mixed
     */
    public function getCountReponses()
    {
        return $this->getReponse()->count();
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
     * Set question
     *
     * @param string $question
     *
     * @return Question
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set isFirst
     *
     * @param boolean $isFirst
     *
     * @return Question
     */
    public function setIsFirst($isFirst)
    {
        $this->isFirst = $isFirst;

        return $this;
    }

    /**
     * Get isFirst
     *
     * @return bool
     */
    public function getIsFirst()
    {
        return $this->isFirst;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Question
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
     * Set qcm
     *
     * @param \AppBundle\Entity\Qcm $qcm
     *
     * @return Question
     */
    public function setQcm(\AppBundle\Entity\Qcm $qcm = null)
    {
        $this->qcm = $qcm;

        return $this;
    }

    /**
     * Get qcm
     *
     * @return \AppBundle\Entity\Qcm
     */
    public function getQcm()
    {
        return $this->qcm;
    }

    /**
     * Add reponse
     *
     * @param \AppBundle\Entity\Question $reponse
     *
     * @return Question
     */
    public function addReponse(\AppBundle\Entity\Reponse $reponse)
    {
        $reponse->setQuestion($this);
        $this->reponse[] = $reponse;

        return $this;
    }

    /**
     * Remove reponse
     *
     * @param \AppBundle\Entity\Question $reponse
     */
    public function removeReponse(\AppBundle\Entity\Reponse $reponse)
    {
        $this->reponse->removeElement($reponse);
    }

    /**
     * Get reponse
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    public function __toString()
    {
        return $this->getQuestion() ? $this->getQuestion() : '';
    }
    /**
     * @param ExecutionContextInterface $context
     * @param $payload
     * @Assert\Callback()
     */
    public function validateFirstQuestion(ExecutionContextInterface $context){
        $questions = $this->getQcm()->getQuestions();
        $questionFound= array();
        var_dump($questions);die();
        foreach ($questions as $q){
            if($q->isFirst){
                $questionFound = $q;
                var_dump($q->getId());die();
                break;
            }
        }
        //var_dump($this->getId());die();
        var_dump($questionFound->getId());die();
        if($this->getIsFirst() && !empty($questionFound) && $questionFound->getId() !== $this->getId()){
            $context->buildViolation('La question ID:' . $questionFound->getId() . ' est la première question')
                ->atPath('firstQuestion')
                ->addViolation()
            ;
        }
    }
}
=======
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionRepository")
 * @Assert\Callback(callback="validateFirstQuestion")
 */
class Question
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
     * @ORM\Column(name="question", type="string", length=255)
     */
    private $question;

    /**
     * @var bool
     *
     * @ORM\Column(name="isFirst", type="boolean")
     */
    private $isFirst;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Qcm",inversedBy="questions")
     * @ORM\JoinColumn(name="qcm_id", referencedColumnName="id")
     */

    private $qcm;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reponse",mappedBy="question",cascade={"persist","remove"})
     */
    private $reponse;

    private $countReponses;

    /**
     * @return mixed
     */
    public function getCountReponses()
    {
        return $this->getReponse()->count();
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
     * Set question
     *
     * @param string $question
     *
     * @return Question
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set isFirst
     *
     * @param boolean $isFirst
     *
     * @return Question
     */
    public function setIsFirst($isFirst)
    {
        $this->isFirst = $isFirst;

        return $this;
    }

    /**
     * Get isFirst
     *
     * @return bool
     */
    public function getIsFirst()
    {
        return $this->isFirst;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Question
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
     * Set qcm
     *
     * @param \AppBundle\Entity\Qcm $qcm
     *
     * @return Question
     */
    public function setQcm(\AppBundle\Entity\Qcm $qcm = null)
    {
        $this->qcm = $qcm;

        return $this;
    }

    /**
     * Get qcm
     *
     * @return \AppBundle\Entity\Qcm
     */
    public function getQcm()
    {
        return $this->qcm;
    }

    /**
     * Add reponse
     *
     * @param \AppBundle\Entity\Question $reponse
     *
     * @return Question
     */
    public function addReponse(\AppBundle\Entity\Reponse $reponse)
    {
        $reponse->setQuestion($this);
        $this->reponse[] = $reponse;

        return $this;
    }

    /**
     * Remove reponse
     *
     * @param \AppBundle\Entity\Question $reponse
     */
    public function removeReponse(\AppBundle\Entity\Reponse $reponse)
    {
        $this->reponse->removeElement($reponse);
    }

    /**
     * Get reponse
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    public function __toString()
    {
        return $this->getQuestion() ? $this->getQuestion() : '';
    }
    /**
     * @param ExecutionContextInterface $context
     * @param $payload
     * @Assert\Callback()
     */
    public function validateFirstQuestion(ExecutionContextInterface $context){
        $questions = $this->getQcm()->getQuestions();
        $questionFound= array();
        var_dump($questions);die();
        foreach ($questions as $q){
            if($q->isFirst){
                $questionFound = $q;
                var_dump($q->getId());die();
                break;
            }
        }
        //var_dump($this->getId());die();
        var_dump($questionFound->getId());die();
        if($this->getIsFirst() && !empty($questionFound) && $questionFound->getId() !== $this->getId()){
            $context->buildViolation('La question ID:' . $questionFound->getId() . ' est la première question')
                ->atPath('firstQuestion')
                ->addViolation()
            ;
        }
    }
}
>>>>>>> 0e186e13b1ed1f48f041f780cd1fd371cd2bab72
