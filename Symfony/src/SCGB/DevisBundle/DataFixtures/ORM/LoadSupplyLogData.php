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
use Ambrelouise\ShopBundle\Entity\Log;

/**
* LoadLogData
*/
class LoadSupplyLogData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
    * Load data
    * @param (object) $manager entity manager
    */
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<=5; $i++) {
            $log = new Log();
            $log->setTitle('loan-jack');
            $log->setSign(1);
            $log->setQuantity(10);
            $log->setReference($manager->merge($this->getReference('reference-'.$i)));
            $log->setReason($manager->merge($this->getReference('logreason-appro')));
            $manager->persist($log);
        }

        $manager->flush();
    }

    /**
    * Get order to load data
    *
    * @return integer order
    */
    public function getOrder()
    {
        return 36; // the order in which fixtures will be loaded
    }
}