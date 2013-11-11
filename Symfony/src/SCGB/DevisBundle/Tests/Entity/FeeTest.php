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
use Ambrelouise\SupplyBundle\Entity\Fee;
use Ambrelouise\SupplyBundle\Entity\FeeCategory;
use Ambrelouise\SupplyBundle\Entity\Supply;
/**
* sellingkindTest
*/
class FeeTest extends WebTestCase
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

        $fee = new Fee();
        $data = 1;
        $fee->setId($data);
        $this->assertEquals($data, $fee->getId());

        $data = new \DateTime();
        $fee->setPaidAt($data);
        $this->assertEquals($data, $fee->getPaidAt());

        $data = 'comment';
        $fee->setComment($data);
        $this->assertEquals($data, $fee->getComment());

        $data = new \DateTime();
        $fee->setCreatedAt($data);
        $this->assertEquals($data, $fee->getCreatedAt());

        $data = new \DateTime();
        $fee->preUpdate();
        $this->assertEquals($data, $fee->getUpdatedAt());
        $fee->setUpdatedAt($data);
        $this->assertEquals($data, $fee->getUpdatedAt());

        $data = 'comment';
        $fee->setInvoiceReference($data);
        $this->assertEquals($data, $fee->getInvoiceReference());
        $this->assertEquals($data, (string) $fee);

        $data = 'comment';
        $fee->setInternReference($data);
        $this->assertEquals($data, $fee->getInternReference());

        $currency = new \Ambrelouise\ShopBundle\Entity\Currency();
        $fee->setCurrency($currency);
        $this->assertEquals($currency, $fee->getCurrency());

        $data = 3;
        $fee->setChangeRate($data);
        $this->assertEquals($data, $fee->getChangeRate());

        $data = 3;
        $fee->setValueEuro($data);
        $this->assertEquals($data, $fee->getValueEuro());

        $data = 3;
        $fee->setValue($data);
        $this->assertEquals($data, $fee->getValue());

        $supplier = new \Ambrelouise\CatalogBundle\Entity\Supplier();
        $fee->setSupplier($supplier);
        $this->assertEquals($supplier, $fee->getSupplier());

        $supply = new Supply();
        $fee->setSupply($supply);
        $this->assertEquals($supply, $fee->getSupply());

        $feeCategory = new FeeCategory();
        $fee->setFeeCategory($feeCategory);
        $this->assertEquals($feeCategory, $fee->getFeeCategory());

    }

    /**
    * test testGetAll
    */
    public function testGetAll()
    {
        $manager = $this->em->getRepository('AmbrelouiseSupplyBundle:Fee');
        $fees = $manager->findAll();
        $this->assertTrue(count($fees) > 1);
    }

    /**
    * test testFindById
    */
    public function testFindById()
    {
        $manager = $this->em->getRepository('AmbrelouiseSupplyBundle:Fee');
        $fee = $manager->find(1);
        $value = $fee->get('id');
        $expected = 1;
        $this->assertEquals($expected, $value);
    }
}
