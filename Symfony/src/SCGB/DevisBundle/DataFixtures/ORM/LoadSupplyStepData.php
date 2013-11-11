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
use Ambrelouise\SupplyBundle\Entity\SupplyStep;

/**
* LoadStatusData
*/
class LoadSupplyStepData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
    * Load data
    * @param (object) $manager entity manager
    */
    public function Load(ObjectManager $manager)
    {

        $supplyStep = new SupplyStep();
        $supplyStep->setId(1);
        $supplyStep->setTitle('Brouillon');
        $supplyStep->setLogAction(-1);
        $supplyStep->setIsEnabled(true);
        $supplyStep->setSupplySettingsIsLocked(false);
        $supplyStep->setFeesIsLocked(false);
        $supplyStep->setProductsIsLocked(false);
        $this->addReference('supply-step-draft', $supplyStep);
        $manager->persist($supplyStep);

        $supplyStep = new SupplyStep();
        $supplyStep->setId(2);
        $supplyStep->setTitle('Approvisionner');
        $supplyStep->setLogAction(1);
        $supplyStep->setIsEnabled(true);
        $supplyStep->setSupplySettingsIsLocked(false);
        $supplyStep->setFeesIsLocked(false);
        $supplyStep->setProductsIsLocked(true);
        $this->addReference('supply-step-supplyed', $supplyStep);
        $manager->persist($supplyStep);

        $supplyStep = new SupplyStep();
        $supplyStep->setId(3);
        $supplyStep->setTitle('Frais Payer');
        $supplyStep->setLogAction(-1);
        $supplyStep->setIsEnabled(true);
        $supplyStep->setSupplySettingsIsLocked(false);
        $supplyStep->setFeesIsLocked(true);
        $supplyStep->setProductsIsLocked(false);
        $this->addReference('supply-step-supply-fees-paied', $supplyStep);
        $manager->persist($supplyStep);

        $supplyStep = new SupplyStep();
        $supplyStep->setId(4);
        $supplyStep->setTitle('Fermer');
        $supplyStep->setLogAction(1);
        $supplyStep->setIsEnabled(true);
        $supplyStep->setSupplySettingsIsLocked(true);
        $supplyStep->setFeesIsLocked(true);
        $supplyStep->setProductsIsLocked(true);
        $this->addReference('supply-step-supply-close', $supplyStep);
        $manager->persist($supplyStep);


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