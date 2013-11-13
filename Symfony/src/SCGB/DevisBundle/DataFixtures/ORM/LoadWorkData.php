<?php

/*******************************************************
*   SCGB - 2013
*     Created by : Rémy ANDREINI
*     Date : 12/11/2013
*   % Last modification : $Id$
*    Contact : andreini@ece.fr
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
        $work->setReference('Peinture support prêt');
        $work->setDescription('Le mur est lisse et préparé.Protection des surfaces, ponçage ou lessivage des murs. Inclut une sous couche et si nécessaire deux couches de peinture.');
        $work->setDuration(0,2);
        $work->setNumberofPeoplemin(1);
		
        $this->addReference('work-1', $work);		
        $manager->persist($work);
		
		$work = new Work();	
		$work->setId(1);		
        $work->setReference('Peinture + préparation du support');
        $work->setDescription('Support partiellement dégradé. Rebouchage et mastiquage des irrégularités. Passage d\'un enduit de lissage. Protection des surfaces, ponçage ou lessivage des murs. Inclut une sous couche et si nécessaire deux couches de peinture.');
        $work->setDuration(0,4);
        $work->setNumberofPeoplemin(1);
		
        $this->addReference('work-2', $work);		
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