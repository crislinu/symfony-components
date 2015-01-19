<?php

namespace ValidatorExamplesBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class ValidatorExamplesExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        
    }

    public function getAlias()
    {
        return 'validator_examples';
    }
}
