<?php

/*******************************************************
*   Twiy - 2013
*     Created by : Rémy ANDREINI
*     Date : 24/04/2013
*   % Last modification : $Id$
*    Contact : remy.andreini@twiy.fr
*******************************************************/

namespace SCGB\DevisBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * RoomRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class WorkRepository extends EntityRepository
{
	public function getQuerySelectType()
	{
		$qb = $this->createQueryBuilder('a')
				   ->where('a.id > 0'); 
		return $qb;
	}

}
