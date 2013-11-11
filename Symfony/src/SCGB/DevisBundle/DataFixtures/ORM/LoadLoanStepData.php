<?php

/*******************************************************
*   Twiy - 2012
*     Created by : Clotaire RENAUD
*     Date : 22/03/2012
*   % Last modification : $Id$
*    Contact : clotaire.renaud@twiy.fr
*******************************************************/


namespace Ambrelouise\SupplyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ambrelouise\SupplyBundle\Entity\LoanStep;

/**
* LoadStatusData
*/
class LoadLoanStepData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
    * Load data
    * @param (object) $manager entity manager
    */
    public function Load(ObjectManager $manager)
    {

        $loanStep = new LoanStep();
        $loanStep->setId(1);
        $loanStep->setTitle('Brouillon');
        $loanStep->setIsEnabled(true);
        $loanStep->setIsClosed(false);
        $this->addReference('loan-step-draft', $loanStep);
        $manager->persist($loanStep);

        $loanStep = new LoanStep();
        $loanStep->setId(2);
        $loanStep->setTitle('Prêter');
        $loanStep->setIsEnabled(true);
        $loanStep->setIsClosed(true);
        $this->addReference('loan-step-loaned', $loanStep);
        $manager->persist($loanStep);

        $loanStep = new LoanStep();
        $loanStep->setId(3);
        $loanStep->setTitle('A vérifier');
        $loanStep->setIsEnabled(true);
        $loanStep->setIsClosed(true);
        $this->addReference('loan-step-tochek', $loanStep);
        $manager->persist($loanStep);

        $loanStep = new LoanStep();
        $loanStep->setId(4);
        $loanStep->setTitle('Clôturer');
        $loanStep->setIsEnabled(true);
        $loanStep->setIsClosed(true);
        $this->addReference('loan-step-close', $loanStep);
        $manager->persist($loanStep);


        $manager->flush();
    }

    /**
    * Get order to load data
    *
    * @return integer order
    */
    public function getOrder()
    {
        return 10; // the order in which fixtures will be loaded
    }
}