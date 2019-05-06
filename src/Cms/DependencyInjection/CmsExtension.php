<?php

namespace Cms\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class CmsExtension
 * @package Cms\DependencyInjection
 */
class CmsExtension extends Extension
{
    
    /**
     * Loads a specific configuration.
     *
     * @throws \InvalidArgumentException When provided tag is not defined in this extension
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new CmsConfiguration();
        $loader        = new YamlFileLoader($container, new FileLocator(\dirname(__DIR__) . '/Resources/config'));
        $config        = $this->processConfiguration($configuration, $configs);
    }
}
