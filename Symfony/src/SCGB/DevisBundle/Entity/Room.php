<?php

/*******************************************************
*   SCGB - 2013
*     Created by : Rémy ANDREINI
*     Date : 13/11/2013
*   % Last modification : $Id$
*    Contact : andreini@ece.fr
*******************************************************/

namespace SCGB\DevisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Property entity
 *
 * @ORM\Table(name="room")
 *
 * @ORM\Entity(repositoryClass="SCGB\DevisBundle\Entity\RoomRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Room
{
     /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id()
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="SCGB\DevisBundle\Entity\Devis", inversedBy="rooms", cascade={"persist"})
     * @ORM\JoinColumn(name="devis_id", referencedColumnName="id")
     */
    private $devis;

    /**
     * @ORM\OneToMany(targetEntity="SCGB\DevisBundle\Entity\RoomWork", mappedBy="room", cascade={"persist", "remove"})
     */
    protected $roomWorks;

    /**
     * @ORM\Column(name="category", type="string", length=150, nullable=true)
     */
    private $category;

    /**
     * @ORM\Column(name="totalWorkAmount", type="decimal", scale=2, nullable=true)
     */
    private $totalWorkAmount;

    /**
     * @ORM\Column(name="name", type="string", length=150, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(name="size", type="decimal", scale=2, nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(name="width", type="decimal", scale=2, nullable=true)
     */
    private $width;

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
     * @return Supply
     */
    public function addRoomWork(\SCGB\DevisBundle\Entity\RoomWork $roomWork)
    {
        $roomWork->setRoom($this);
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
     * Set name
     *
     * @param string $name
     *
     * @return Work
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Work
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set devis
     *
     * @param \SCGB\DevisBundle\Entity\Devis $devis
     *
     * @return SupplyProduct
     */
    public function setDevis(\SCGB\DevisBundle\Entity\Devis $devis = null)
    {
        $this->devis = $devis;

        return $this;
    }

    /**
     * Get devis
     *
     * @return \SCGB\DevisBundle\Entity\Supply
     */
    public function getDevis()
    {
        return $this->devis;
    }

     /**
     * Set totalWorkAmount
     *
     * @param float $totalWorkAmount
     *
     * @return Room
     */
    public function setTotalWorkAmount($totalWorkAmount)
    {
        $this->totalWorkAmount = $totalWorkAmount;

        return $this;
    }

    /**
     * Get totalWorkAmount
     *
     * @return float
     */
    public function getTotalWorkAmount()
    {
        return $this->totalWorkAmount;
    }

     /**
     * Set size
     *
     * @param float $size
     *
     * @return Room
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return float
     */
    public function getSize()
    {
        return $this->size;
    }

     /**
     * Set width
     *
     * @param float $width
     *
     * @return Room
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
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

        return true;
    }

}