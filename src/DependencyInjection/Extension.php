<?php declare(strict_types=1);

namespace Yireo\FileLinkMapper\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension as ParentExtension;

class Extension extends ParentExtension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration($this->getConfiguration($configs, $container), $configs);
        foreach ($config as $key => $option) {
            $container->setParameter($this->getAlias().'.'.$key, $option);
        }
    }

    public function getConfiguration(array $config, ContainerBuilder $container): ConfigurationInterface
    {
        return new Configuration();
    }

    public function getAlias(): string
    {
        return 'yireo_file_link_mapper';
    }
}