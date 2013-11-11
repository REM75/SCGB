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
use Doctrine\Common\DataFixtures\SupplyedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ambrelouise\SupplyBundle\Entity\Supply;
use Ambrelouise\ShopBundle\Entity\Log;

/**
* LoadCarrierData
*/
class LoadSupplyData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
    * Load data
    *
    * @param (object) $manager entity manager
    */
    public function load(ObjectManager $manager)
    {

        $date = "29-04-2013";

        $supply = new Supply();
        $supply->setReferenceSupplier('679968');
        $supply->setReferenceIntern('MA-FACTURE-EA01');
        $supply->setCurrency($manager->merge($this->getReference('currency-euro')));
        $supply->setSupplier($manager->merge($this->getReference('supplier-1')));
        $supply->setStep($manager->merge($this->getReference('supply-step-draft')));
        $supply->setComment('bijoux recu ! ');
        $supply->setCountProducts(2);
        $supply->setSupplyDate(new \DateTime($date));
        $supply->setPaidAt(new \DateTime($date));
        $supply->setChangeRate(1);
        $supply->setCountProducts(0);

        $supply->addSupplyProduct($manager->merge($this->getReference('supply-product-1')));
        $supply->addFee($manager->merge($this->getReference('supply-fee-1')));

        $manager->persist($supply);

        $supply = new Supply();
        $supply->setReferenceSupplier('547812');
        $supply->setReferenceIntern('MA-FACTURE-EA02');
        $supply->setCurrency($manager->merge($this->getReference('currency-dollar')));
        $supply->setSupplier($manager->merge($this->getReference('supplier-2')));
        $supply->setStep($manager->merge($this->getReference('supply-step-draft')));
        $supply->setComment(' ');
        $supply->setCountProducts(1);
        $supply->setSupplyDate(new \DateTime($date));
        $supply->setPaidAt(new \DateTime($date));
        $supply->setChangeRate(1.3084);


        $supply->addSupplyProduct($manager->merge($this->getReference('supply-product-2')));
        $supply->addFee($manager->merge($this->getReference('supply-fee-2')));

        $manager->persist($supply);

        $supply = new Supply();
        $supply->setReferenceSupplier('45812');
        $supply->setReferenceIntern('MA-FACTURE-EA03');
        $supply->setCurrency($manager->merge($this->getReference('currency-euro')));
        $supply->setSupplier($manager->merge($this->getReference('supplier-1')));
        $supply->setStep($manager->merge($this->getReference('supply-step-supplyed')));
        $supply->setComment('jack');
        $supply->setSupplyDate(new \DateTime($date));
        $supply->setPaidAt(new \DateTime($date));
        $supply->setChangeRate(1);
        $supply->setCountProducts(0);

        $log = new Log();
        $log->setTitle('Approvisionnement Johnny');
        $log->setSign(1);
        $log->setQuantity(10);
        $log->setReference($manager->merge($this->getReference('reference-0')));
        $log->setReason($manager->merge($this->getReference('logreason-appro')));
        $supply->addLog($log);

        $log = new Log();
        $log->setTitle('Approvisionnement Walker');
        $log->setSign(1);
        $log->setQuantity(10);
        $log->setReference($manager->merge($this->getReference('reference-3')));
        $log->setReason($manager->merge($this->getReference('logreason-appro')));
        $supply->addLog($log);

        $log = new Log();
        $log->setTitle('Approvisionnement Jones');
        $log->setCreatedAt(new \DateTime($date));
        $log->setSign(1);
        $log->setQuantity(10);
        $log->setReference($manager->merge($this->getReference('reference-3')));
        $log->setReason($manager->merge($this->getReference('logreason-appro')));
        $supply->addLog($log);
        $manager->persist($supply);
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
        return 35; // the order in which fixtures will be loaded
    }
}