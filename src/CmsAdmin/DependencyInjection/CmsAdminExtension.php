<?php

namespace CmsAdmin\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class CmsAdminExtension
 * @package CmsAdmin\DependencyInjection
 */
class CmsAdminExtension extends Extension
{
    
    /**
     * Loads a specific configuration.
     *
     * @throws \InvalidArgumentException When provided tag is not defined in this extension
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new CmsAdminConfiguration();
        $loader        = new YamlFileLoader($container, new FileLocator(\dirname(__DIR__) . '/Resources/config'));
        $config        = $this->processConfiguration($configuration, $configs);
    }
}
