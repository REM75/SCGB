<?php

/*******************************************************
*   Twiy - 2013
*     Created by : Rémy ANDREINI
*     Date : 24/04/2013
*   % Last modification : $Id$
*    Contact : remy.andreini@twiy.fr
*******************************************************/

namespace SCGB\SupplyBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Ambrelouise\SupplyBundle\Entity\FeeCategory;
use Ambrelouise\SupplyBundle\Entity\Fee;
/**
* sellingkindTest
*/
class FeeCategoryTest extends WebTestCase
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

        $feeCategory = new FeeCategory();
        $data = 1;
        $feeCategory->setId($data);
        $this->assertEquals($data, $feeCategory->getId());

        $data = 'comment';
        $feeCategory->setTitle($data);
        $this->assertEquals($data, $feeCategory->getTitle());
        $this->assertEquals($data, (string) $feeCategory);

        $data = 'comment';
        $feeCategory->setComment($data);
        $this->assertEquals($data, $feeCategory->getComment());

        $data = 'comment';
        $feeCategory->setComputedFormula($data);
        $this->assertEquals($data, $feeCategory->getComputedFormula());


        $data = new \DateTime();
        $feeCategory->setCreatedAt($data);
        $this->assertEquals($data, $feeCategory->getCreatedAt());

        $data = new \DateTime();
        $feeCategory->preUpdate();
        $this->assertEquals($data, $feeCategory->getUpdatedAt());
        $feeCategory->setUpdatedAt($data);
        $this->assertEquals($data, $feeCategory->getUpdatedAt());

        $fee = new Fee();
        $fee->setId(1);
        $fee->setInvoiceReference('6-992-66563');
        $fee->setInternReference('Fact-01');
        $fee->setCurrency(1);
        $fee->setComment('        ');
        $fee->setPaidAt(new \DateTime());
        $fee->setChangeRate(1);
        $fee->setFeeCategory($feeCategory);
        $fee->setValue(50, 5);
        $feeCategory->addFee($fee);
        $this->assertEquals(1, count($feeCategory->getFees()));

        $feeCategory->removeFee($fee);
        $this->assertEquals(0, count($feeCategory->getFees()));

    }

    /**
    * test testGetAll
    */
    public function testGetAll()
    {
        $manager = $this->em->getRepository('AmbrelouiseSupplyBundle:FeeCategory');
        $feeCategorys = $manager->findAll();
        $this->assertTrue(count($feeCategorys) > 1);
    }

    /**
    * test testFindById
    */
    public function testFindById()
    {
        $manager = $this->em->getRepository('AmbrelouiseSupplyBundle:FeeCategory');
        $feeCategory = $manager->find(1);
        $value = $feeCategory->get('id');
        $expected = 1;
        $this->assertEquals($expected, $value);
    }
}
