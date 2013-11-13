<?php

/*******************************************************
*   SCGB - 2013
*     Created by : Rémy ANDREINI
*     Date : 13/11/2013
*   % Last modification : $Id$
*    Contact : andreini@ece.fr
*******************************************************/

namespace SCGB\DevisBundle\Controller;

//use Twtools\ComponentBundle\Controllers\DefaultAdminController;
//use Twtools\ComponentBundle\Filter\FilterBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use SCGB\DevisBundle\Entity\Devis;
use SCGB\DevisBundle\Entity\Room;
use SCGB\DevisBundle\Form\DevisType;

/**
* AdminController
*/
class DevisAdminController extends Controller
{
	/**
    * Default action to add new
    *
    * @return (object) kernel response
    */
	public function newAction()
	{
		$devis = new Devis();
		$form = $this->createForm(new DevisType(), $devis);
		$form->setData($devis);

		$request = $this->get('request');

		if ($request->getMethod() == 'POST') {
			  $form->bind($request);

			  if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($devis);
				$em->flush();

				return $this->redirect($this->generateUrl('devis_update', array('id' => $devis->getId())));
			  }
		}

		return $this->render('SCGBDevisBundle:DevisAdmin:new.html.twig', array('form' => $form->createView(),));
	}

	/**
    * Update an entity
    * @param (integer) $id id of the entity to update
    *
    * @return show the property list in html format
    */
    public function updateAction($id)
    {
        $request = $this->get('request');
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SCGBDevisBundle:Devis')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('No entity found for id '.$id);
        }

		$form = $this->createForm(new DevisType(), $entity);
		$form->setData($entity);


		$request = $this->get('request');

		if ($request->getMethod() == 'POST') {
			  $form->bind($request);

			  if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($entity);
				$em->flush();

				return $this->redirect($this->generateUrl('devis_list', array('id' => $entity->getId())));
			  }
		}

		return $this->render('SCGBDevisBundle:DevisAdmin:new.html.twig', array('form' => $form->createView(),'entity' => $entity));

    }

	/**
    * List an entity
    * @param (integer) $id id of the entity to list
    *
    * @return show the property list in html format
    */
    public function listAction($id)
    {
        $request = $this->get('request');
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SCGBDevisBundle:Devis')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('No entity found for id '.$id);
        }
		$newcost = 0;
		foreach ($entity->getRooms() as $room) {
			$newcost += $room->getTotalWorkAmount();
        }
		$entity->setGlobalAmount($newcost);

		$request = $this->get('request');

		return $this->render('SCGBDevisBundle:DevisAdmin:list.html.twig', array('entity' => $entity));

    }

	/**
    * Find an entity
    * @param (integer) $id id of the entity to list
    *
    * @return show the property list in html format
    */
    public function findAction()
    {
        $request = $this->get('request');
        $em = $this->getDoctrine()->getManager();        

		if ($request->getMethod() == 'POST') {
			$entity = $em->getRepository('SCGBDevisBundle:Devis')->find($id);
			if (!$entity) {
				throw $this->createNotFoundException('No entity found for id '.$id);
			}
			  $form->bind($request);

			  if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($entity);
				$em->flush();

				return $this->redirect($this->generateUrl('devis_list', array('id' => $entity->getId())));
			  }
		}

		return $this->render('SCGBDevisBundle:DevisAdmin:find.html.twig');

    }

}
