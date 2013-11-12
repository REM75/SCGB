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
use SCGB\DevisBundle\Entity\Work;

/**
* LoadStatusData
*/
class LoadWorkData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
    * Load data
    * @param (object) $manager entity manager
    */
    public function Load(ObjectManager $manager)
    {
        $work = new Work();	
		$work->setId(1);		
        $work->setReference('paint_01');
        $work->setDescription('blablabla 1');
        $work->setDuration(1,2);
        $work->setNumberofPeoplemin(1);
        $work->setDuration(10,2);
		
        $this->addReference('work-1', $work);		
        $manager->persist($work);

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