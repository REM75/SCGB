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
use Ambrelouise\SupplyBundle\Entity\LoanStep;
/**
* sellingkindTest
*/
class LoanStepTest extends WebTestCase
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

        $loanstep = new LoanStep();
        $this->assertEquals(null, $loanstep->getId());

        $data = 1;
        $loanstep->setId($data);
        $this->assertEquals($data, $loanstep->getId());

        $data = 'comment';
        $loanstep->setTitle($data);
        $this->assertEquals($data, $loanstep->getTitle());
        $this->assertEquals($data, (string) $loanstep);

        $data = true;
        $loanstep->setIsEnabled($data);
        $this->assertEquals($data, $loanstep->getIsEnabled());

        $data = true;
        $loanstep->setIsClosed($data);
        $this->assertEquals($data, $loanstep->getIsClosed());
    }

    /**
    * test testGetAll
    */
    public function testGetAll()
    {
        $manager = $this->em->getRepository('AmbrelouiseSupplyBundle:Loan');
        $loansteps = $manager->findAll();
        $this->assertTrue(count($loansteps) > 1);
    }

    /**
    * test testFindById
    */
    public function testFindById()
    {
        $manager = $this->em->getRepository('AmbrelouiseSupplyBundle:Loan');
        $loanstep = $manager->find(1);
        $value = $loanstep->get('id');
        $expected = 1;
        $this->assertEquals($expected, $value);
    }
}
