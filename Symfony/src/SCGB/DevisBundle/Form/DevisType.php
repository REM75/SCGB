<?php

/*******************************************************
*   Twiy - 2013
*     Created by : Rémy ANDREINI
*     Date : 24/04/2013
*   % Last modification : $Id$
*    Contact : remy.andreini@twiy.fr
*******************************************************/

namespace SCGB\DevisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


/**
* LogReasonType
*/
class DevisType extends AbstractType
{

    /**
    * buildForm
    * @param FormBuilderInterface $builder
    * @param array                $options
    *
    * @return null
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // $builder->add('globalAmount', 'text', array('label'  => 'Global Amount', 'required'  => true));
        // $builder->add('totalTime', 'text', array('label'  => 'Total Time', 'required'  => true));
		$builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($builder) {
			$data = $event->getData();
			$event->getForm()->add($builder->getFormFactory()
							 ->createNamed('rooms', 'collection', null, 
						array(
							'label' => ' ',
							'type' => new RoomType(),
							'allow_add' => true,
							'by_reference' => false,
							'allow_delete' => true,
							'auto_initialize' => false,
							'options' => array(
								'data_class' => 'SCGB\DevisBundle\Entity\Room')
						)));
		});
    }


    /**
    * getName
    *
    * @return user
    */
    public function getName()
    {
        return 'devis';
    }

}
