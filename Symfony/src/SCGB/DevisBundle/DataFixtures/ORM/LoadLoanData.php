<?php

/*******************************************************
*   Twiy - 2013
*     Created by : Rémy ANDREINI
*     Date : 24/04/2013
*   % Last modification : $Id$
*    Contact : remy.andreini@twiy.fr
*******************************************************/


namespace Ambrelouise\SupplyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\LoanedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ambrelouise\SupplyBundle\Entity\Loan;
use Ambrelouise\ShopBundle\Entity\Log;

/**
* LoadCarrierData
*/
class LoadLoanData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
    * Load data
    *
    * @param (object) $manager entity manager
    */
    public function load(ObjectManager $manager)
    {
        $loan = new Loan();
        $loan->setCustomer($manager->merge($this->getReference('user-marc')));
        $loan->setStep($manager->merge($this->getReference('loan-step-draft')));
        $loan->setChannel($manager->merge($this->getReference('selling-channel-internet')));
        $loan->setComment('2 bijoux ont été prêté');
        $loan->setCountProducts(2);
        $loan->setDate(new \DateTime());
        $manager->persist($loan);


        $loan = new Loan();
        $loan->setCustomer($manager->merge($this->getReference('user-clotaire')));
        $loan->setStep($manager->merge($this->getReference('loan-step-loaned')));
        $loan->setChannel($manager->merge($this->getReference('selling-channel-trunk')));
        $loan->setComment('bijoux');
        $loan->setCountProducts(2);
        $loan->setDate(new \DateTime());
        $manager->persist($loan);

        $loan = new Loan();
        $loan->setCustomer($manager->merge($this->getReference('user-agathe')));
        $loan->setStep($manager->merge($this->getReference('loan-step-draft')));
        $loan->setChannel($manager->merge($this->getReference('selling-channel-trunk')));

        $log = new Log();
        $log->setTitle('Prêt jack');
        $log->setSign(1);
        $log->setQuantity(10);
        $log->setReference($manager->merge($this->getReference('reference-0')));
        $log->setReason($manager->merge($this->getReference('logreason-loan-out')));
        $loan->addLog($log);

        $log = new Log();
        $log->setTitle('Prêt jack');
        $log->setSign(1);
        $log->setQuantity(10);
        $log->setReference($manager->merge($this->getReference('reference-3')));
        $log->setReason($manager->merge($this->getReference('logreason-loan-out')));
        $loan->addLog($log);

        $log = new Log();
        $log->setTitle('Prêt jack');
        $date = "29-04-2013";
        $log->setCreatedAt(new \DateTime($date));
        $log->setSign(1);
        $log->setQuantity(10);
        $log->setReference($manager->merge($this->getReference('reference-3')));
        $log->setReason($manager->merge($this->getReference('logreason-loan-out')));
        $loan->addLog($log);
        $loan->setComment('jack');
        $loan->setCountProducts(2);
        $loan->setDate(new \DateTime());
        $manager->persist($loan);
        $manager->persist($log);

        $manager->flush();
    }

    /**
    * Get order to load data
    *
    * @return integer order
    */
    public function getOrder()
    {
        return 30; // the order in which fixtures will be loaded
    }
}