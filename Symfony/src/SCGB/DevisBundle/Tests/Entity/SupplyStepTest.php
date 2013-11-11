<?php

/*******************************************************
*   Twiy - 2013
*     Created by : Rémy ANDREINI
*     Date : 24/04/2013
*   % Last modification : $Id$
*    Contact : remy.andreini@twiy.fr
*******************************************************/

namespace Ambrelouise\SupplyBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Ambrelouise\SupplyBundle\Entity\SupplyStep;
use Ambrelouise\SupplyBundle\Entity\Supply;
/**
* sellingkindTest
*/
class SupplyStepTest extends WebTestCase
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

        $supplystep = new Supplystep();
        $this->assertEquals(null, $supplystep->getId());

        $data = 1;
        $supplystep->setId($data);
        $this->assertEquals($data, $supplystep->getId());

        $data = 'comment';
        $supplystep->setTitle($data);
        $this->assertEquals($data, $supplystep->getTitle());
        $this->assertEquals($data, (string) $supplystep);

        $supply = new Supply();
        $supplystep->addSupplie($supply);
        $this->assertEquals(1, count($supplystep->getSupplies()));

        $supplystep->removeSupplie($supply);
        $this->assertEquals(0, count($supplystep->getSupplies()));

        $data = 'comment';
        $supplystep->setLogAction($data);
        $this->assertEquals($data, $supplystep->getLogAction());

        $data = true;
        $supplystep->setIsEnabled($data);
        $this->assertEquals($data, $supplystep->getIsEnabled());

        $data = true;
        $supplystep->setSupplySettingsIsLocked($data);
        $this->assertEquals($data, $supplystep->getSupplySettingsIsLocked());

        $data = true;
        $supplystep->setProductsIsLocked($data);
        $this->assertEquals($data, $supplystep->getProductsIsLocked());

        $data = true;
        $supplystep->setFeesIsLocked($data);
        $this->assertEquals($data, $supplystep->getFeesIsLocked());
    }

    /**
    * test testGetAll
    */
    public function testGetAll()
    {
        $manager = $this->em->getRepository('AmbrelouiseSupplyBundle:Loan');
        $supplysteps = $manager->findAll();
        $this->assertTrue(count($supplysteps) > 1);
    }

    /**
    * test testFindById
    */
    public function testFindById()
    {
        $manager = $this->em->getRepository('AmbrelouiseSupplyBundle:Loan');
        $supplystep = $manager->find(1);
        $value = $supplystep->get('id');
        $expected = 1;
        $this->assertEquals($expected, $value);
    }
}
