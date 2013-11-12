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
use SCGB\DevisBundle\Entity\Room;

/**
* LoadStatusData
*/
class LoadRoomData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
    * Load data
    * @param (object) $manager entity manager
    */
    public function Load(ObjectManager $manager)
    {
        $room = new Room();		
        $room->setId(1);
        $room->setCategory('room');
        $room->setTotalWorkAmount(100);
        $room->setName('Salon');
        $room->setSize(40);
        $room->setWidth(2,5);
		
        $this->addReference('salon-1', $room);		
        $manager->persist($room);
		
		$room = new Room();		
        $room->setId(2);
        $room->setCategory('kitchen');
        $room->setTotalWorkAmount(250);
        $room->setName('Cuisine');
        $room->setSize(10);
        $room->setWidth(2,5);
		
        $this->addReference('cuisine-1', $room);		
        $manager->persist($room);
		
		$room = new Room();		
        $room->setId(3);
        $room->setCategory('kitchen');
        $room->setTotalWorkAmount(250);
        $room->setName('To delete');
        $room->setSize(10);
        $room->setWidth(2,5);
			
        $manager->persist($room);

        $manager->flush();
    }

    /**
    * Get order to load data
    *
    * @return integer order
    */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}