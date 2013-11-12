<?php

/*******************************************************
*   Twiy - 2012
*     Created by : Clotaire RENAUD
*     Date : 22/03/2012
*   % Last modification : $Id$
*    Contact : clotaire.renaud@twiy.fr
*******************************************************/


namespace SCGB\DevisBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SCGB\DevisBundle\Entity\Devis;

/**
* LoadStatusData
*/
class LoadDevisData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
    * Load data
    * @param (object) $manager entity manager
    */
    public function Load(ObjectManager $manager)
    {
        $devis = new Devis();		
        $devis->setId(1);
        $devis->setGlobalAmount(1,2);
        $devis->setTotalTime(1,2);		
        $devis->addRoom($manager->merge($this->getReference('cuisine-1')));
        $devis->addRoom($manager->merge($this->getReference('salon-1')));
		$manager->merge($this->getReference('cuisine-1')->setDevis($devis));
		$manager->merge($this->getReference('salon-1')->setDevis($devis));
		
        $this->addReference('devis 1', $devis);		
        $manager->persist($devis);

        $manager->flush();
    }

    /**
    * Get order to load data
    *
    * @return integer order
    */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}