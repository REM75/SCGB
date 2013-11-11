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
use Ambrelouise\SupplyBundle\Entity\Fee;

/**
* LoadStatusData
*/
class LoadFeeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
    * Load data
    * @param (object) $manager entity manager
    */
    public function Load(ObjectManager $manager)
    {
        $fee = new Fee();
        $fee->setId(1);
        $fee->setInvoiceReference('6-992-66563');
        $fee->setInternReference('Fact-01');
        $fee->setCurrency($manager->merge($this->getReference('currency-euro')));
        $fee->setComment('        ');
        $fee->setPaidAt(new \DateTime());
        $fee->setChangeRate(1);
        $fee->setFeeCategory($manager->merge($this->getReference('fee-caterogy-transport-laposte')));
        $fee->setValue(50, 5);

        $this->addReference('supply-fee-1', $fee);
        $manager->persist($fee);

        $fee = new Fee();
        $fee->setId(1);
        $fee->setInvoiceReference('H04-1328');
        $fee->setInternReference('Fact-01');
        $fee->setCurrency($manager->merge($this->getReference('currency-dollar')));
        $fee->setComment('une frai en dollar, non payer!');
        $fee->setChangeRate(1.3084);
        $fee->setFeeCategory($manager->merge($this->getReference('fee-caterogy-custom-4-gold')));
        $fee->setValue(12.7);

        $this->addReference('supply-fee-2', $fee);
        $manager->persist($fee);

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