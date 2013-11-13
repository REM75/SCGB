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
class RoomWorkTest extends WebTestCase
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

        $roomWork = new RoomWork();
        $this->assertEquals(null, $roomWork->getId());

        $data = 3;
        $roomWork->setId($data);
        $this->assertEquals($data, $roomWork->getId());

        $data = new \DateTime();
        $roomWork->setCreatedAt($data);
        $this->assertEquals($data, $roomWork->getCreatedAt());

        $data = new \DateTime();
        $roomWork->preUpdate();
        $this->assertEquals($data, $roomWork->getUpdatedAt());
        $roomWork->setUpdatedAt($data);

        $data = 'test';
        $roomWork->setComment($data);
        $this->assertEquals($data, $roomWork->getComment());

        $data = 3;
        $roomWork->setQuantity($data);
        $this->assertEquals($data, $roomWork->getQuantity());

        $room = new Room();
        $roomWork->setRoom($room);
        $this->assertEquals($room, $roomWork->getRoom());

        $work = new Work();
        $roomWork->setWork($work);
        $this->assertEquals($work, $roomWork->getWork());

    }

    /**
    * test testGetAll
    */
    public function testGetAll()
    {
        $manager = $this->em->getRepository('SCGBDevisBundle:RoomWork');
        $roomWork = $manager->findAll();
        $this->assertTrue(count($roomWork) == 1);
    }

    /**
    * test testFindById
    */
    public function testFindById()
    {
        $manager = $this->em->getRepository('SCGBDevisBundle:RoomWork');
        $roomWork = $manager->find(1);
        $value = $roomWork->get('id');
        $expected = 1;
        $this->assertEquals($expected, $value);
    }
}
