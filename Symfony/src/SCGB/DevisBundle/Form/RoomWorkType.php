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
use SCGB\DevisBundle\Entity\Work;


/**
* LogReasonType
*/
class RoomWorkType extends AbstractType
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
		/*$builder->add('work', 'entity', array('label' => 'Travail',
		  'class'    => 'SCGBDevisBundle:Work',
		  'property' => 'reference',
		  'multiple' => true)
		);*/
		$builder->add('work', 'entity',
            array( 'label' => 'Travail',
                'class' => 'SCGBDevisBundle:Work',
                'property' => 'reference',
                'query_builder' =>
                    function(\SCGB\DevisBundle\Entity\WorkRepository $r) {
                        return $r->getQuerySelectType();
                    },
                'required' => true,
        ));
        $builder->add('quantity', 'text', array('label' => 'Quantité (m²)', 'required' => true));
        $builder->add('comment', 'textarea', array('label' => 'Commentaire', 'required' => false));

    }

	/**
    * setDefaultOptions
    * @param OptionsResolverInterface $resolver
    */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SCGB\DevisBundle\Entity\RoomWork',
        ));
    }

    /**
    * getName
    *
    * @return user
    */
    public function getName()
    {
        return 'roomwork';
    }

}
