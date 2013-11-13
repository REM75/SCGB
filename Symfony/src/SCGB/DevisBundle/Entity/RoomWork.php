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
 * @ORM\Table(name="room_work")
 *
 * @ORM\Entity(repositoryClass="SCGB\DevisBundle\Entity\RoomWorkRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class RoomWork
{
     /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id()
     */
    protected $id;
	
	/**
     * @ORM\ManyToOne(targetEntity="SCGB\DevisBundle\Entity\Room", inversedBy="roomWorks", cascade={"persist"})
     * @ORM\JoinColumn(name="room_id", referencedColumnName="id")
     */
    private $room;
	
	/**
     * @ORM\ManyToOne(targetEntity="SCGB\DevisBundle\Entity\Work", inversedBy="roomWorks", cascade={"persist"})
     * @ORM\JoinColumn(name="work_id", referencedColumnName="id")
     */
    private $work;
	
	/**
     * @ORM\Column(name="quantity", type="smallint", nullable=true)
     */
    protected $quantity;
	
	/**
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;
	
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
     * Set work
     *
     * @param \SCGB\DevisBundle\Entity\Work $work
     *
     * @return RoomWork
     */
    public function setWork(\SCGB\DevisBundle\Entity\Work $work)
    {
        $this->work = $work;

        return $this;
    }

    /**
     * Get work
     *
     * @return \SCGB\DevisBundle\Entity\Work
     */
    public function getWork()
    {
        return $this->work;
    }
	
	 /**
     * Set room
     *
     * @param \SCGB\DevisBundle\Entity\Room $room
     *
     * @return RoomWork
     */
    public function setRoom(\SCGB\DevisBundle\Entity\Room $room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room
     *
     * @return \SCGB\DevisBundle\Entity\Room
     */
    public function getRoom()
    {
        return $this->room;
    }
	
	/**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return RoomWork
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
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
     * Set comment
     *
     * @param string $comment
     *
     * @return RoomWork
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
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