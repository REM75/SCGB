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
use SCGB\DevisBundle\Entity\RoomWork;

/**
* LoadStatusData
*/
class LoadRoomWorkData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
    * Load data
    * @param (object) $manager entity manager
    */
    public function Load(ObjectManager $manager)
    {
        $roomWork = new RoomWork();
        $roomWork->setId(1);
        $roomWork->setQuantity(1);
        $roomWork->setComment('test');

        $this->addReference('roomWork-1', $roomWork);
        $manager->persist($roomWork);

        $manager->flush();
    }

    /**
    * Get order to load data
    *
    * @return integer order
    */
    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}