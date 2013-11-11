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
class RoomType extends AbstractType
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
        $builder->add('category', 'choice', array('label'  => 'Catégorie ', 'choices'   => array('bath' => 'Salle de Bain', 'kitchen' => 'Cuisine', 'room' => 'Salon/Chambre', 'outside' => 'Extérieur'), 'required'  => true));
        $builder->add('name', 'text', array('label'  => 'Nom', 'required'  => true));
        $builder->add('size', 'text', array('label'  => 'Taile (m²)', 'required'  => true));
        $builder->add('width', 'text', array('label'  => 'Hauteur (m)', 'required'  => true));
    }
	
	/**
    * setDefaultOptions
    * @param OptionsResolverInterface $resolver
    */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SCGB\DevisBundle\Entity\Room',
        ));
    }

    /**
    * getName
    *
    * @return user
    */
    public function getName()
    {
        return 'room';
    }

}
