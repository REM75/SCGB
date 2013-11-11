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
use Ambrelouise\SupplyBundle\Entity\SupplyProduct;

/**
* LoadStatusData
*/
class LoadSupplyProductData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
    * Load data
    * @param (object) $manager entity manager
    */
    public function Load(ObjectManager $manager)
    {

        $supplyProduct = new SupplyProduct();
        $supplyProduct->setId(1);
        $supplyProduct->setQuantity(2);
        $supplyProduct->setSerialNumber('13-000001');
        $supplyProduct->setRawValue(15, 2);
        $supplyProduct->setComment('un petit commentaire');
        $supplyProduct->setReference($manager->merge($this->getReference('reference-0')));

        $this->addReference('supply-product-1', $supplyProduct);
        $manager->persist($supplyProduct);

        $supplyProduct = new SupplyProduct();
        $supplyProduct->setId(2);
        $supplyProduct->setQuantity(1);
        $supplyProduct->setSerialNumber('13-000002');
        $supplyProduct->setRawValue(119, 99);
        $supplyProduct->setComment('un petit commentaire');
        $supplyProduct->setReference($manager->merge($this->getReference('reference-1')));

        $this->addReference('supply-product-2', $supplyProduct);
        $manager->persist($supplyProduct);


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