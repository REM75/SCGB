<?php

/*******************************************************
*   Twiy - 2013
*     Created by : Clotaire RENAUD
*     Date : 07/05/2013
*   % Last modification : $Id$
*    Contact : clotaire.renaud@twiy.fr
*******************************************************/

namespace SCGB\DevisBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
* Add a new twtools_view
*
* @author Clotaire RENAUD <clotaire.renaud@twiy.fr>
*/
class BreadcrumbPass implements CompilerPassInterface
{
    /**
    * {@inheritdoc}
    */
    public function process(ContainerBuilder $container)
    {
        $config = $container->getParameter('twtools_component');
        if (isset($config['breadcrumb'])) {
            $breadcrumb = $config['breadcrumb'];
        } else {
            $breadcrumb = array();
        }

        $breadcrumb['admin'][2]['admin_supply_loan_list']['title'] = 'supply.loan.title';
        $breadcrumb['admin'][2]['admin_supply_loan_list']['group'] = 'catalog.loan';
        $breadcrumb['admin'][3]['admin_supply_loan_list']['title'] = 'supply.loan.list.title';
        $breadcrumb['admin'][3]['admin_supply_loan_list']['group'] = 'catalog.loan';
        $breadcrumb['admin'][3]['admin_supply_loan_new']['title'] = 'supply.loan.new.title';
        $breadcrumb['admin'][3]['admin_supply_loan_new']['group'] = 'catalog.loan';
        $breadcrumb['admin'][3]['admin_supply_loan_update']['title'] = 'supply.loan.update.title';
        $breadcrumb['admin'][3]['admin_supply_loan_update']['group'] = 'catalog.loan';
        $breadcrumb['admin'][3]['admin_supply_loan_update']['parameters']['id'] = 'id';
        $breadcrumb['admin'][3]['admin_supply_loan_addlogs']['title'] = 'supply.loan.add.title';
        $breadcrumb['admin'][3]['admin_supply_loan_addlogs']['group'] = 'catalog.loan';
        $breadcrumb['admin'][3]['admin_supply_loan_addlogs']['parameters']['id'] = 'id';
        $breadcrumb['admin'][3]['admin_supply_loan_returnlogs']['title'] = 'supply.loan.return.title';
        $breadcrumb['admin'][3]['admin_supply_loan_returnlogs']['group'] = 'catalog.loan';
        $breadcrumb['admin'][3]['admin_supply_loan_returnlogs']['parameters']['id'] = 'id';


        $breadcrumb['admin'][2]['admin_supply_supply_list']['title'] = 'supply.supply.title';
        $breadcrumb['admin'][2]['admin_supply_supply_list']['group'] = 'catalog.supply';
        $breadcrumb['admin'][3]['admin_supply_supply_list']['title'] = 'supply.supply.list.title';
        $breadcrumb['admin'][3]['admin_supply_supply_list']['group'] = 'catalog.supply';
        $breadcrumb['admin'][3]['admin_supply_supply_new']['title'] = 'supply.supply.new.title';
        $breadcrumb['admin'][3]['admin_supply_supply_new']['group'] = 'catalog.supply';
        $breadcrumb['admin'][3]['admin_supply_supply_update']['title'] = 'supply.supply.update.title';
        $breadcrumb['admin'][3]['admin_supply_supply_update']['group'] = 'catalog.supply';
        $breadcrumb['admin'][3]['admin_supply_supply_update']['parameters']['id'] = 'id';

        $breadcrumb['admin'][2]['admin_supply_feecategory_list']['title'] = 'supply.feecategory.title';
        $breadcrumb['admin'][2]['admin_supply_feecategory_list']['group'] = 'catalog.feecategory';
        $breadcrumb['admin'][3]['admin_supply_feecategory_list']['title'] = 'supply.feecategory.list.title';
        $breadcrumb['admin'][3]['admin_supply_feecategory_list']['group'] = 'catalog.feecategory';
        $breadcrumb['admin'][3]['admin_supply_feecategory_new']['title'] = 'supply.feecategory.new.title';
        $breadcrumb['admin'][3]['admin_supply_feecategory_new']['group'] = 'catalog.feecategory';
        $breadcrumb['admin'][3]['admin_supply_feecategory_update']['title'] = 'supply.feecategory.update.title';
        $breadcrumb['admin'][3]['admin_supply_feecategory_update']['group'] = 'catalog.feecategory';
        $breadcrumb['admin'][3]['admin_supply_feecategory_update']['parameters']['id'] = 'id';

        $breadcrumb['admin'][2]['admin_supply_step_list']['title'] = 'supply.step.title';
        $breadcrumb['admin'][2]['admin_supply_step_list']['group'] = 'catalog.supplystep';
        $breadcrumb['admin'][3]['admin_supply_step_list']['title'] = 'supply.step.list.title';
        $breadcrumb['admin'][3]['admin_supply_step_list']['group'] = 'catalog.supplystep';
        $breadcrumb['admin'][3]['admin_supply_step_new']['title'] = 'supply.step.new.title';
        $breadcrumb['admin'][3]['admin_supply_step_new']['group'] = 'catalog.supplystep';
        $breadcrumb['admin'][3]['admin_supply_step_update']['title'] = 'supply.step.update.title';
        $breadcrumb['admin'][3]['admin_supply_step_update']['group'] = 'catalog.supplystep';
        $breadcrumb['admin'][3]['admin_supply_step_update']['parameters']['id'] = 'id';

        $breadcrumb['admin'][2]['admin_supply_loanstep_list']['title'] = 'supply.loanstep.title';
        $breadcrumb['admin'][2]['admin_supply_loanstep_list']['group'] = 'catalog.loanstep';
        $breadcrumb['admin'][3]['admin_supply_loanstep_list']['title'] = 'supply.loanstep.list.title';
        $breadcrumb['admin'][3]['admin_supply_loanstep_list']['group'] = 'catalog.loanstep';
        $breadcrumb['admin'][3]['admin_supply_loanstep_new']['title'] = 'supply.loanstep.new.title';
        $breadcrumb['admin'][3]['admin_supply_loanstep_new']['group'] = 'catalog.loanstep';
        $breadcrumb['admin'][3]['admin_supply_loanstep_update']['title'] = 'supply.loanstep.update.title';
        $breadcrumb['admin'][3]['admin_supply_loanstep_update']['group'] = 'catalog.loanstep';
        $breadcrumb['admin'][3]['admin_supply_loanstep_update']['parameters']['id'] = 'id';

        $breadcrumb['admin'][2]['admin_supply_barcode']['title'] = 'supply.barcode.title';
        $breadcrumb['admin'][2]['admin_supply_barcode']['group'] = 'catalog.barcode';

        $config['breadcrumb'] = $breadcrumb;
        $container->setParameter('twtools_component', $config);
    }
}

