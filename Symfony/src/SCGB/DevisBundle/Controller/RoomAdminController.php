<?php

/*******************************************************
*   Twiy - 2013
*     Created by : Rémy ANDREINI
*     Date : 24/04/2013
*   % Last modification : $Id$
*    Contact : remy.andreini@twiy.fr
*******************************************************/

namespace SCGB\DevisBundle\Controller;

//use Twtools\ComponentBundle\Controllers\DefaultAdminController;
//use Twtools\ComponentBundle\Filter\FilterBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use SCGB\DevisBundle\Entity\RoomWork;
use SCGB\DevisBundle\Entity\Room;
use SCGB\DevisBundle\Form\RoomWorkType;

/**
* AdminController
*/
class RoomAdminController extends Controller
{
	/**
    * Default action to add room
    *
    * @return (object) kernel response
    */
	public function addWorkAction($id)
	{
		$request = $this->get('request');
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SCGBDevisBundle:Room')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('No entity found for id '.$id);
        }	
		
		$roomWork = new RoomWork();
		$form = $this->createForm(new RoomWorkType(), $roomWork);
		$form->setData($roomWork);
							
		$request = $this->get('request');	
		
		if ($request->getMethod() == 'POST') {
			  $form->bind($request);
		 
			  if ($form->isValid()) {
				$roomWork->setRoom($entity);
				$em = $this->getDoctrine()->getManager();
				$em->persist($roomWork);
				$em->flush();
		 
				return $this->redirect($this->generateUrl('room_add_work', array('id' => $entity->getId(), 'entity' => $entity, 'devisId' => $entity->getDevis()->getId())));
			  }		  
		}

		return $this->render('SCGBDevisBundle:RoomAdmin:new.html.twig', array('form' => $form->createView(), 'entity' => $entity, 'devisId' => $entity->getDevis()->getId()));
	}
	
	/**
    * Remove DEFINITIVELY an entity
    * @param (integer) $id id of the netity to delete
    *
    * @return (object) kernel response
    */
    public function removeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SCGBDevisBundle:Room')
                    ->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('No entity found for id '.$id);
        }
		$myDevis = $entity->getDevis()->getId();
        if ($entity->isDeletable()) {
            $em->remove($entity);
            $em->flush();
            $this->container->get('session')->getFlashBag()->set('notice', 'form.success');
        } else {
            $this->container->get('session')->getFlashBag()->set('warning', 'form.failed');
        }
		

		return $this->redirect($this->generateUrl('devis_list', array('id' => $myDevis)));
    }

}
