<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CustomerRepository")
 */
class Customer
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->themes = new ArrayCollection();
        $this->coupons = new ArrayCollection();
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
     * @var bool
     *
     * @ORM\Column(name="sms", type="boolean")
     */
    private $sms;

    /**
     * @var bool
     *
     * @ORM\Column(name="newsletter", type="boolean")
     */
    private $newsletter;



    /**
     * @ORM\Column(name="creation_date",type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\UserBundle\Entity\User",cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AgeEnfant")
     * @ORM\JoinColumn(name="age_enfant_id",referencedColumnName="id",nullable=true)
     */
    private $ageEnfants;


    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Theme")
     * @ORM\JoinTable(
     *     name="customer_themes"
     * )
     */
    private $themes;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Coupon")
     * @ORM\JoinTable(name="customer_coupons")
     */
    private $coupons;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pharmacie")
     */
    private $pharmacie;

    private $sexe;

    /**
     * @return mixed
     */
    public function getSexe()
    {
        if($this->getUser()->getGender() === 'm'){
            return 'Homme';
        }
        else{
            return 'Femme';
        }
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
     * Set sms
     *
     * @param boolean $sms
     *
     * @return Customer
     */
    public function setSms($sms)
    {
        $this->sms = $sms;

        return $this;
    }

    /**
     * Get sms
     *
     * @return bool
     */
    public function getSms()
    {
        return $this->sms;
    }

    /**
     * Set newsletter
     *
     * @param boolean $newsletter
     *
     * @return Customer
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * Get newsletter
     *
     * @return bool
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }



    /**
     * Set user
     *
     * @param \Application\Sonata\UserBundle\Entity\User $user
     *
     * @return Customer
     */
    public function setUser(\Application\Sonata\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Application\Sonata\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }


    /**
     * Set ageEnfants
     *
     * @param \AppBundle\Entity\AgeEnfant $ageEnfants
     *
     * @return Customer
     */
    public function setAgeEnfants(\AppBundle\Entity\AgeEnfant $ageEnfants = null)
    {
        $this->ageEnfants = $ageEnfants;

        return $this;
    }

    /**
     * Get ageEnfants
     *
     * @return \AppBundle\Entity\AgeEnfant
     */
    public function getAgeEnfants()
    {
        return $this->ageEnfants;
    }

    /**
     * Add theme
     *
     * @param \AppBundle\Entity\Theme $theme
     *
     * @return Customer
     */
    public function addTheme(\AppBundle\Entity\Theme $theme)
    {
        $this->themes[] = $theme;

        return $this;
    }

    /**
     * Remove theme
     *
     * @param \AppBundle\Entity\Theme $theme
     */
    public function removeTheme(\AppBundle\Entity\Theme $theme)
    {
        $this->themes->removeElement($theme);
    }

    /**
     * Get themes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getThemes()
    {
        return $this->themes;
    }

    /**
     * Add coupon
     *
     * @param \AppBundle\Entity\Coupon $coupon
     *
     * @return Customer
     */
    public function addCoupon(\AppBundle\Entity\Coupon $coupon)
    {
        $this->coupons[] = $coupon;

        return $this;
    }

    /**
     * Remove coupon
     *
     * @param \AppBundle\Entity\Coupon $coupon
     */
    public function removeCoupon(\AppBundle\Entity\Coupon $coupon)
    {
        $this->coupons->removeElement($coupon);
    }

    /**
     * Get coupons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCoupons()
    {
        return $this->coupons;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Customer
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

    public function __toString()
    {
        return $this->getUser() ? $this->getUser()->getUsername() : '';
    }

    /**
     * Set pharmacie
     *
     * @param \AppBundle\Entity\Pharmacie $pharmacie
     *
     * @return Customer
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
}
