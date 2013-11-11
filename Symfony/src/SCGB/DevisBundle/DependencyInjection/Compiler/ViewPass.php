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
class ViewPass implements CompilerPassInterface
{
    /**
    * {@inheritdoc}
    */
    public function process(ContainerBuilder $container)
    {
        $config = $container->getParameter('twtools_component');
        if (isset($config['view']['filters'])) {
            $filters = $config['view']['filters'];
        } else {
            $filters = array();
        }
        $filters[crc32('SCGB\DevisBundle\Filter\LoanFilter')] = 'SCGB\DevisBundle\Filter\LoanFilter';
        $filters[crc32('SCGB\DevisBundle\Filter\SupplyFilter')] = 'SCGB\DevisBundle\Filter\SupplyFilter';
        $filters[crc32('SCGB\DevisBundle\Filter\SupplyStepFilter')] = 'SCGB\DevisBundle\Filter\SupplyStepFilter';
        $filters[crc32('SCGB\DevisBundle\Filter\LoanStepFilter')] = 'SCGB\DevisBundle\Filter\LoanStepFilter';
        $filters[crc32('SCGB\DevisBundle\Filter\FeeCategoryFilter')] = 'SCGB\DevisBundle\Filter\FeeCategoryFilter';
        $config['view']['filters'] = $filters;
        $container->setParameter('twtools_component', $config);
    }
}

