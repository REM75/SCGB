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
use Ambrelouise\SupplyBundle\Entity\Loan;
use Ambrelouise\ShopBundle\Entity\Log;
use Ambrelouise\CatalogBundle\Entity\Reference;
use Ambrelouise\ShopBundle\Entity\LogReason;
/**
* sellingkindTest
*/
class LoanTest extends WebTestCase
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

        $loan = new Loan();
        $this->assertEquals(null, $loan->getId());

        $data = 3;
        $loan->setId($data);
        $this->assertEquals($data, $loan->getId());

        $data = new \DateTime();
        $loan->setDate($data);
        $this->assertEquals($data, $loan->getDate());

        $data = 'comment';
        $loan->setComment($data);
        $this->assertEquals($data, $loan->getComment());
        $this->assertEquals($data, (string) $loan);

        $data = 3;
        $loan->setValueProductsLoaned($data);
        $this->assertEquals($data, $loan->getValueProductsLoaned());

        $data = 3;
        $loan->setCountProducts($data);
        $this->assertEquals($data, $loan->getCountProducts());

        $data = new \DateTime();
        $loan->setCreatedAt($data);
        $this->assertEquals($data, $loan->getCreatedAt());

        $data = new \DateTime();
        $loan->preUpdate();
        $this->assertEquals($data, $loan->getUpdatedAt());
        $loan->setUpdatedAt($data);
        $this->assertEquals($data, $loan->getUpdatedAt());

        $data = new \Ambrelouise\UserBundle\Entity\User();
        $loan->setCustomer($data);
        $this->assertEquals($data, $loan->getCustomer());

        $data = 'comment';
        $loan->setStep($data);
        $this->assertEquals($data, $loan->getStep());

        $data = new \Ambrelouise\SellingBundle\Entity\SellingChannel();
        $loan->setChannel($data);
        $this->assertEquals($data, $loan->getChannel());

        $this->assertEquals(true, $loan->isDeletable());

        $log = new Log();
        $log->setTitle('Loan jack');
        $log->setLoan($loan);
        $log->setQuantity(2);
        $log->setSign(-1);
        $reason = new LogReason();
        $reference = new Reference();
        $log->setReference($reference);
        $log->setReason($reason);
        $loan->addLog($log);
        $this->assertEquals(1, count($loan->getLogs()));

        $this->assertEquals(false, $loan->isDeletable());

        $loan->removeLog($log);
        $this->assertEquals(0, count($loan->getLogs()));

    }

    /**
    * test testGetAll
    */
    public function testGetAll()
    {
        $manager = $this->em->getRepository('AmbrelouiseSupplyBundle:Loan');
        $loans = $manager->findAll();
        $this->assertTrue(count($loans) > 1);
    }

    /**
    * test testFindById
    */
    public function testFindById()
    {
        $manager = $this->em->getRepository('AmbrelouiseSupplyBundle:Loan');
        $loan = $manager->find(1);
        $value = $loan->get('id');
        $expected = 1;
        $this->assertEquals($expected, $value);
    }
}
