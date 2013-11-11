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
use Ambrelouise\SupplyBundle\Entity\FeeCategory;

/**
* LoadStatusData
*/
class LoadFeeCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
    * Load data
    * @param (object) $manager entity manager
    */
    public function Load(ObjectManager $manager)
    {

        $feeCategory = new FeeCategory();
        $feeCategory->setId(1);
        $feeCategory->setTitle('Frais de Port La poste');
        $feeCategory->setComputedFormula('none');
        $feeCategory->setComment('Frais de port abonnement pro');
        $this->addReference('fee-caterogy-transport-laposte', $feeCategory);
        $manager->persist($feeCategory);

        $feeCategory = new FeeCategory();
        $feeCategory->setId(2);
        $feeCategory->setTitle('Frais de Douane 4 %');
        $feeCategory->setComputedFormula('none');
        $feeCategory->setComment('A appliquer sur les bijoux dorés');
        $this->addReference('fee-caterogy-custom-4-gold', $feeCategory);
        $manager->persist($feeCategory);


        $manager->flush();
    }

    /**
    * Get order to load data
    *
    * @return integer order
    */
    public function getOrder()
    {
        return 25; // the order in which fixtures will be loaded
    }
}