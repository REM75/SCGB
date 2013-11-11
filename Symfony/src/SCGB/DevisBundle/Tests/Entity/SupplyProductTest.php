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
use Ambrelouise\SupplyBundle\Entity\SupplyProduct;
use Ambrelouise\SupplyBundle\Entity\Supply;
use Ambrelouise\CatalogBundle\Entity\Reference;
/**
* sellingkindTest
*/
class SupplyProductTest extends WebTestCase
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
        $supplyProduct = new SupplyProduct();
        $data = 1;
        $supplyProduct->setId($data);
        $this->assertEquals($data, $supplyProduct->getId());

        $data = 'comment';
        $supplyProduct->setComment($data);
        $this->assertEquals($data, $supplyProduct->getComment());

        $data = 3;
        $supplyProduct->setComputedValue($data);
        $this->assertEquals($data, $supplyProduct->getComputedValue());

        $data = 3;
        $supplyProduct->setQuantity($data);
        $this->assertEquals($data, $supplyProduct->getQuantity());

        $data = 3;
        $supplyProduct->setConvertedValue($data);
        $this->assertEquals($data, $supplyProduct->getConvertedValue());

        $data = 3;
        $supplyProduct->setRawValue($data);
        $this->assertEquals($data, $supplyProduct->getRawValue());

        $data = 3;
        $supplyProduct->setTaxedValue($data);
        $this->assertEquals($data, $supplyProduct->getTaxedValue());

        $data = new \DateTime();
        $supplyProduct->setCreatedAt($data);
        $this->assertEquals($data, $supplyProduct->getCreatedAt());

        $data = new \DateTime();
        $supplyProduct->preUpdate();
        $this->assertEquals($data, $supplyProduct->getUpdatedAt());
        $supplyProduct->setUpdatedAt($data);
        $this->assertEquals($data, $supplyProduct->getUpdatedAt());

        $supply = new Supply();
        $supplyProduct->setSupply($supply);
        $this->assertEquals($supply, $supplyProduct->getSupply());

        $reference = new \Ambrelouise\CatalogBundle\Entity\Reference();
        $supplyProduct->setReference($reference);
        $this->assertEquals($reference, $supplyProduct->getReference());

        $product = new \Ambrelouise\CatalogBundle\Entity\Product();
        $supplyProduct->setProduct($product);
        $this->assertEquals($product, $supplyProduct->getProduct());

    }

    /**
    * test testGetAll
    */
    public function testGetAll()
    {
        $manager = $this->em->getRepository('AmbrelouiseSupplyBundle:SupplyProduct');
        $supplyProducts = $manager->findAll();
        $this->assertTrue(count($supplyProducts) > 1);
    }

    /**
    * test testFindById
    */
    public function testFindById()
    {
        $manager = $this->em->getRepository('AmbrelouiseSupplyBundle:SupplyProduct');
        $supplyProduct = $manager->find(1);
        $value = $supplyProduct->get('id');
        $expected = 1;
        $this->assertEquals($expected, $value);
    }
}
