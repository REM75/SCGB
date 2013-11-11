<?php

namespace SCGB\DevisBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use SCGB\DevisBundle\DependencyInjection\Compiler\ViewPass;
use SCGB\DevisBundle\DependencyInjection\Compiler\BreadcrumbPass;

/**
* SCGBDevisBundle
*/
class SCGBDevisBundle extends Bundle
{
    /**
    * build
    * @param ContainerBuilder $container
    */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        //$container->addCompilerPass(new ViewPass());
        //$container->addCompilerPass(new BreadcrumbPass());
    }

}
