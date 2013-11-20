<?php
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
 * @ORM\Table(name="devis")
 *
 * @ORM\Entity(repositoryClass="SCGB\DevisBundle\Entity\DevisRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Devis
{
     /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id()
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="SCGB\DevisBundle\Entity\Room", mappedBy="devis", cascade={"persist", "remove"})
     */
    protected $rooms;

    /**
     * @ORM\Column(name="globalAmount", type="decimal", scale=2, nullable=true)
     */
    private $globalAmount;

    /**
     * @ORM\Column(name="totalTime", type="decimal", scale=2, nullable=true)
     */
    private $totalTime;

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
        $this->rooms = new ArrayCollection();

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
     * Add Room
     *
     * @param \SCGB\DevisBundle\Entity\Room $room
     *
     * @return Supply
     */
    public function addRoom(\SCGB\DevisBundle\Entity\Room $room)
    {
        $room->setDevis($this);
        $this->rooms[] = $room;

        return $this;
    }

    /**
     * Remove Room
     *
     * @param \SCGB\DevisBundle\Entity\Room $room
     */
    public function removeRoom(\SCGB\DevisBundle\Entity\Room $room)
    {
        $this->rooms->removeElement($room);
    }

    /**
     * Get Rooms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRooms()
    {
        return $this->rooms;
    }

     /**
     * Set globalAmount
     *
     * @param float $globalAmount
     *
     * @return Devis
     */
    public function setGlobalAmount($globalAmount)
    {
        $this->globalAmount = $globalAmount;

        return $this;
    }

    /**
     * Get globalAmount
     *
     * @return float
     */
    public function getGlobalAmount()
    {
        return $this->globalAmount;
    }

     /**
     * Set totalTime
     *
     * @param float $totalTime
     *
     * @return Devis
     */
    public function setTotalTime($totalTime)
    {
        $this->totalTime = $totalTime;

        return $this;
    }

    /**
     * Get totalTime
     *
     * @return float
     */
    public function getTotalTime()
    {
        return $this->totalTime;
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