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
use Ambrelouise\SupplyBundle\Entity\Supply;
use Ambrelouise\SupplyBundle\Entity\SupplyStep;
use Ambrelouise\SupplyBundle\Entity\Fee;
use Ambrelouise\SupplyBundle\Entity\SupplyProduct;
use Ambrelouise\ShopBundle\Entity\Log;
use Ambrelouise\CatalogBundle\Entity\Reference;
use Ambrelouise\ShopBundle\Entity\LogReason;
/**
* sellingkindTest
*/
class SupplyTest extends WebTestCase
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

        $supply = new Supply();
        $this->assertEquals(null, $supply->getId());

        $data = 3;
        $supply->setId($data);
        $this->assertEquals($data, $supply->getId());

        $data = new \DateTime();
        $supply->setSupplyDate($data);
        $this->assertEquals($data, $supply->getSupplyDate());

        $data = new \DateTime();
        $supply->setPaidAt($data);
        $this->assertEquals($data, $supply->getPaidAt());

        $data = 'comment';
        $supply->setComment($data);
        $this->assertEquals($data, $supply->getComment());

        $data = 3;
        $supply->setCountProducts($data);
        $this->assertEquals($data, $supply->getCountProducts());

        $data = new \DateTime();
        $supply->setCreatedAt($data);
        $this->assertEquals($data, $supply->getCreatedAt());

        $data = new \DateTime();
        $supply->preUpdate();
        $this->assertEquals($data, $supply->getUpdatedAt());
        $supply->setUpdatedAt($data);
        $this->assertEquals($data, $supply->getUpdatedAt());

        $supplier = new \Ambrelouise\CatalogBundle\Entity\Supplier();
        $supply->setSupplier($supplier);
        $this->assertEquals($supplier, $supply->getSupplier());

        $step = new \Ambrelouise\SupplyBundle\Entity\SupplyStep();
        $supply->setStep($step);
        $this->assertEquals($step, $supply->getStep());

        $data = 'comment';
        $supply->setReferenceSupplier($data);
        $this->assertEquals($data, $supply->getReferenceSupplier());
        $this->assertEquals($data, (string) $supply);

        $data = 'comment';
        $supply->setReferenceIntern($data);
        $this->assertEquals($data, $supply->getReferenceIntern());

        $currency = new \Ambrelouise\ShopBundle\Entity\Currency();
        $supply->setCurrency($currency);
        $this->assertEquals($currency, $supply->getCurrency());

        $data = 'comment';
        $supply->setValueJewelry($data);
        $this->assertEquals($data, $supply->getValueJewelry());

        $data = 'comment';
        $supply->setValueFees($data);
        $this->assertEquals($data, $supply->getValueFees());

        $data = 3;
        $supply->setChangeRate($data);
        $this->assertEquals($data, $supply->getChangeRate());

        $this->assertEquals(true, $supply->isDeletable());


        $fee = new \Ambrelouise\SupplyBundle\Entity\Fee();
        $fee->setId(10);
        $fee->setInvoiceReference('6-992-66563');
        $fee->setInternReference('Fact-01');
        $fee->setCurrency(1);
        $fee->setComment('        ');
        $fee->setPaidAt(new \DateTime());
        $fee->setChangeRate(1);
        $fee->setValue(50, 5);

        $supply->addFee($fee);
        $this->assertEquals(1, count($supply->getFees()));
        $supply->removeFee($fee);
        $this->assertEquals(0, count($supply->getFees()));



        $supplyProduct = new \Ambrelouise\SupplyBundle\Entity\SupplyProduct();
        $supplyProduct->setId(10);
        $supplyProduct->setQuantity(2);
        $supplyProduct->setRawValue(15, 2);
        $supplyProduct->setComment('un petit commentaire');

        $supply->addSupplyProduct($supplyProduct);
        $this->assertEquals(1, count($supply->getSupplyProducts()));

        $this->assertEquals(false, $supply->isDeletable());

        $supply->removeSupplyProduct($supplyProduct);
        $this->assertEquals(0, count($supply->getSupplyProducts()));

        $this->assertEquals(true, $supply->isDeletable());
        $log = new Log();
        $log->setTitle('Supply jack');
        $log->setSupply($supply);
        $log->setQuantity(2);
        $log->setSign(-1);
        $reason = new LogReason();
        $reference = new Reference();
        $log->setReference($reference);
        $log->setReason($reason);
        $supply->addLog($log);
        $this->assertEquals(1, count($supply->getLogs()));

        $supply->removeLog($log);
        $this->assertEquals(0, count($supply->getLogs()));

    }

    /**
    * test testGetAll
    */
    public function testGetAll()
    {
        $manager = $this->em->getRepository('AmbrelouiseSupplyBundle:Supply');
        $supplys = $manager->findAll();
        $this->assertTrue(count($supplys) > 1);
    }

    /**
    * test testFindById
    */
    public function testFindById()
    {
        $manager = $this->em->getRepository('AmbrelouiseSupplyBundle:Supply');
        $supply = $manager->find(1);
        $value = $supply->get('id');
        $expected = 1;
        $this->assertEquals($expected, $value);
    }
}
