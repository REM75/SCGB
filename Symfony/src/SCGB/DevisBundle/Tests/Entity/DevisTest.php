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
class DevisTest extends WebTestCase
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

        $devis = new Devis();
        $this->assertEquals(null, $devis->getId());

        $data = 3;
        $devis->setTotalTime($data);
        $this->assertEquals($data, $devis->getTotalTime());

        $data = 3;
        $devis->setGlobalAmount($data);
        $this->assertEquals($data, $devis->getGlobalAmount());

        $data = 3;
        $devis->setId($data);
        $this->assertEquals($data, $devis->getId());

        $data = new \DateTime();
        $devis->setCreatedAt($data);
        $this->assertEquals($data, $devis->getCreatedAt());

        $data = new \DateTime();
        $devis->preUpdate();
        $this->assertEquals($data, $devis->getUpdatedAt());
        $devis->setUpdatedAt($data);
		
        $room = new Room();
        $devis->addRoom($room);
        $this->assertEquals(1, count($devis->getRooms()));

        $devis->removeRoom($room);
        $this->assertEquals(0, count($devis->getRooms()));

    }

    /**
    * test testGetAll
    */
    public function testGetAll()
    {
        $manager = $this->em->getRepository('SCGBDevisBundle:Devis');
        $devis = $manager->findAll();
        $this->assertTrue(count($devis) == 1);
    }

    /**
    * test testFindById
    */
    public function testFindById()
    {
        $manager = $this->em->getRepository('SCGBDevisBundle:Devis');
        $devis = $manager->find(4);
        $value = $devis->get('id');
        $expected = 4;
        $this->assertEquals($expected, $value);
    }
}
