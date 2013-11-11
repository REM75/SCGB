<?php

/*******************************************************
*   Twiy - 2013
*     Created by : Rémy ANDREINI
*     Date : 24/04/2013
*   % Last modification : $Id$
*    Contact : remy.andreini@twiy.fr
*******************************************************/

namespace SCGB\DevisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Property entity
 *
 * @ORM\Table(name="work")
 *
 * @ORM\Entity(repositoryClass="SCGB\DevisBundle\Entity\WorkRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Work
{
     /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id()
     */
    protected $id;
	
	 /**
     * @ORM\OneToMany(targetEntity="SCGB\DevisBundle\Entity\RoomWork", mappedBy="work", cascade={"persist", "remove"})
     */
    protected $roomWorks;
	
	/**
     * @ORM\Column(name="reference", type="string", length=150, nullable=true)
     */
    private $reference;
	
	/**
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(name="duration", type="decimal", scale=2, nullable=true)
     */
    private $duration;

	/**
     * @ORM\Column(name="numberofPeoplemin", type="integer", nullable=true)
     */
    private $numberofPeoplemin;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * __tostring for form
     *
     * @return comment
     */
    public function __toString()
    {
        $string = (string) $this->comment;

        return $string;
    }

    /**
    * Contructor
    */
    public function __construct()
    {
        $this->roomWorks = new ArrayCollection();

    }

    /**
    * get
    * @param string $key
    *
    * @return string
    */
    public function get($key)
    {
        $this->$key;

        return call_user_func(array($this, 'get' . ucfirst($key)));
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     *
     * @return boolean
    */
    public function preUpdate()
    {
        if ($this->createdAt == null) {
            $this->createdAt = new \DateTime();
        }

        $this->updatedAt = new \DateTime();
    }
	
	/**
     * Add roomWorks
     *
     * @param \SCGB\DevisBundle\Entity\RoomWork $roomWork
     *
     * @return Work
     */
    public function addRoomWork(\SCGB\DevisBundle\Entity\RoomWork $roomWork)
    {
        $roomWork->setWork($this);
        $this->roomWorks[] = $roomWork;

        return $this;
    }

    /**
     * Remove roomWorks
     *
     * @param \SCGB\DevisBundle\Entity\RoomWork $roomWork
     */
    public function removeRoomWork(\SCGB\DevisBundle\Entity\RoomWork $roomWork)
    {
        $this->roomWorks->removeElement($roomWork);
    }

    /**
     * Get roomWorks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoomWorks()
    {
        return $this->roomWorks;
    }

     /**
     * Set duration
     *
     * @param float $duration
     *
     * @return Work
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return float
     */
    public function getDuration()
    {
        return $this->duration;
    }
	
	
     /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Work
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }
	
	/**
     * Set description
     *
     * @param string $description
     *
     * @return Work
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

     /**
     * Set numberofPeoplemin
     *
     * @param float $numberofPeoplemin
     *
     * @return Work
     */
    public function setNumberofPeoplemin($numberofPeoplemin)
    {
        $this->numberofPeoplemin = $numberofPeoplemin;

        return $this;
    }

    /**
     * Get numberofPeoplemin
     *
     * @return float
     */
    public function getnumberofPeoplemin()
    {
        return $this->numberofPeoplemin;
    }

    /**
     * Set id
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Loan
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Loan
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
    * is deletable
    *
    * @return boolean
    */
    public function isDeletable()
    {
        if (count($this->logs) == 0) {
            return true;
        }

        return false;
    }

}