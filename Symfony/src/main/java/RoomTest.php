<?php

/*******************************************************
*   Twiy - 2013
*     Created by : Rémy ANDREINI
*     Date : 24/04/2013
*   % Last modification : $Id$
*    Contact : remy.andreini@twiy.fr
*******************************************************/

namespace SCGB\DevisBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use SCGB\DevisBundle\Entity\Devis;
use SCGB\DevisBundle\Entity\Room;
use SCGB\DevisBundle\Entity\RoomWork;
use SCGB\DevisBundle\Entity\Work;

/**
* sellingkindTest
*/
class RoomTest extends WebTestCase
{
    private $em;

    /**
    * Set initial kernel
    */
    public function setUp()
    {
        $kernel = $this->createClient()->getKernel();
        $kernel->boot();
        $this->em =$kernel->getContainer()->get('doctrine')->getManager();
    }

    /**
    * close db connection
    */
    public function tearDown()
    {
        $this->em->getConnection()->close();
        parent::tearDown();
    }

    /**
    * Test testSetGet
    */
    public function testSetGet()
    {

        $room = new Room();
        $this->assertEquals(null, $room->getId());

        $data = 3;
        $room->setId($data);
        $this->assertEquals($data, $room->getId());

        $data = new \DateTime();
        $room->setCreatedAt($data);
        $this->assertEquals($data, $room->getCreatedAt());

        $data = new \DateTime();
        $room->preUpdate();
        $this->assertEquals($data, $room->getUpdatedAt());
        $room->setUpdatedAt($data);

        $data = 'test';
        $room->setCategory($data);
        $this->assertEquals($data, $room->getCategory());

        $data = 'test';
        $room->setName($data);
        $this->assertEquals($data, $room->getName());

        $data = 3;
        $room->setTotalWorkAmount($data);
        $this->assertEquals($data, $room->getTotalWorkAmount());

        $data = 3;
        $room->setSize($data);
        $this->assertEquals($data, $room->getSize());

        $data = 3;
        $room->setWidth($data);
        $this->assertEquals($data, $room->getWidth());

        $devis = new Devis();
        $room->setDevis($devis);
        $this->assertEquals($devis, $room->getDevis());

        $roomWork = new RoomWork();
        $room->addRoomWork($roomWork);
        $this->assertEquals(1, count($room->getRoomWorks()));

        $room->removeRoomWork($roomWork);
        $this->assertEquals(0, count($room->getRoomWorks()));

    }

    /**
    * test testGetAll
    */
    public function testGetAll()
    {
        $manager = $this->em->getRepository('SCGBDevisBundle:Room');
        $room = $manager->findAll();
        $this->assertTrue(count($room) == 3);
    }

    /**
    * test testFindById
    */
    public function testFindById()
    {
        /*$manager = $this->em->getRepository('SCGBDevisBundle:Room');
        $room = $manager->find(10);
        $value = $room->get('id');
        $expected = 10;
        $this->assertEquals($expected, $value);*/
    }
}
