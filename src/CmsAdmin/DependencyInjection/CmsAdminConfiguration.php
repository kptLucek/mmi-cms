<?php

namespace CmsAdmin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class CmsAdminConfiguration
 * @package CmsAdmin\DependencyInjection
 */
class CmsAdminConfiguration implements ConfigurationInterface
{
    
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('cms_admin');
        $node        = $treeBuilder->getRootNode();
        
        return $treeBuilder;
    }
}
