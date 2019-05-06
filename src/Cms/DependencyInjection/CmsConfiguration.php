<?php

namespace Cms\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class CmsConfiguration
 * @package Cms\DependencyInjection
 */
class CmsConfiguration implements ConfigurationInterface
{
    
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('cms');
        $node        = $treeBuilder->getRootNode();
        
        return $treeBuilder;
    }
}
