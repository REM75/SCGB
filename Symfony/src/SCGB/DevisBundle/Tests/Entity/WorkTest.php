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
class WorkTest extends WebTestCase
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

        $work = new Work();
        $this->assertEquals(null, $work->getId());

        $data = 3;
        $work->setId($data);
        $this->assertEquals($data, $work->getId());

        $data = new \DateTime();
        $work->setCreatedAt($data);
        $this->assertEquals($data, $work->getCreatedAt());

        $data = new \DateTime();
        $work->preUpdate();
        $this->assertEquals($data, $work->getUpdatedAt());
        $work->setUpdatedAt($data);

        $data = 'test';
        $work->setReference($data);
        $this->assertEquals($data, $work->getReference());

        $data = 'test';
        $work->setDescription($data);
        $this->assertEquals($data, $work->getDescription());

        $data = 3;
        $work->setDuration($data);
        $this->assertEquals($data, $work->getDuration());

        $data = 3;
        $work->setNumberofPeoplemin($data);
        $this->assertEquals($data, $work->getNumberofPeoplemin());

        $roomWork = new RoomWork();
        $work->addRoomWork($roomWork);
        $this->assertEquals(1, count($work->getRoomWorks()));

        $work->removeRoomWork($roomWork);
        $this->assertEquals(0, count($work->getRoomWorks()));


    }

    /**
    * test testGetAll
    */
    public function testGetAll()
    {
        $manager = $this->em->getRepository('SCGBDevisBundle:Work');
        $work = $manager->findAll();
        $this->assertTrue(count($work) == 2);
    }

    /**
    * test testFindById
    */
    public function testFindById()
    {
        /*$manager = $this->em->getRepository('SCGBDevisBundle:Work');
        $work = $manager->find(6);
        $value = $work->get('id');
        $expected = 6;
        $this->assertEquals($expected, $value);*/
    }
}
