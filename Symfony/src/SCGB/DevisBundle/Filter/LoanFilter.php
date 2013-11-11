<?php

/*******************************************************
*   Twiy - 2013
*     Created by : Rémy ANDREINI
*     Date : 24/04/2013
*   % Last modification : $Id$
*    Contact : remy.andreini@twiy.fr
*******************************************************/
namespace Ambrelouise\SupplyBundle\Filter;

use Twtools\ComponentBundle\Filter\AbstractFilter;
use Twtools\ComponentBundle\Filter\FilterBuilder;

/**
* ReturnStepFilter
*/
class LoanFilter extends AbstractFilter
{

    /**
    * usage: call add method for each field of the array with attributes:
    *            - (string) name: name of the field (please use entity field name)
    *            - (array)  options: legalOption = 'searchable', 'orderable', 'hidden', 'label'
    *               - (boolean,string,array) searchable : type of search input type (text, choices or false)
    *               - (boolean) orderable
    *               - (sting) type (integer, string, daterange) help to build the request with
    * @param (object) $builder
    *
    * @return this
    */
    public function buildFilter(FilterBuilder $builder)
    {
        $builder->add('id', array('searchable' => true, 'orderable' => true, 'hidden' => true, 'type' => 'integer', 'label' => 'Id'));
        $builder->add('customer', array('searchable' => true, 'orderable' => true, 'hidden' => false, 'type' => 'index', 'tooltip' => 'admin_user_tooltip', 'label' => 'Customer'));
        $builder->add('countProducts', array('searchable' => true, 'orderable' => true, 'hidden' => false, 'type' => 'integer', 'label' => 'Count products'));
        $builder->add('valueProductsLoaned', array('searchable' => false, 'orderable' => true, 'hidden' => false, 'type' => 'integer', 'label' => 'Loaned value'));
        $builder->add('channel', array('searchable' => true, 'orderable' => true, 'hidden' => false, 'type' => 'index', 'label' => 'Channel'));
        $builder->add('date', array('searchable' => true, 'orderable' => true, 'hidden' => false, 'type' => 'daterange', 'label' => 'Date'));
        $builder->add('createdAt', array('searchable' => true, 'orderable' => true, 'hidden' => false, 'type' => 'daterange', 'label' => 'Created At'));
        $builder->add('updatedAt', array('searchable' => true, 'orderable' => true, 'hidden' => false, 'type' => 'daterange', 'label' => 'Updated At'));
        $builder->add('comment', array('searchable' => false, 'orderable' => false, 'hidden' => false, 'type' => 'string', 'label' => 'Comment'));
        $builder->add('step', array('searchable' => true, 'orderable' => false, 'hidden' => false, 'type' => 'index', 'label' => 'Step'));
        $this->builder = $builder;

        return $this;
    }

   /**
    * Build the dql request
    *
    * @return (object) dql request
    */
    protected function buildQuery()
    {
        $orderBy = $this->getSort();
        if ($orderBy == null) {
             $this->setSort('createdAt');
             $this->setSortType('desc');
        }

        return parent::buildQuery();
    }
}