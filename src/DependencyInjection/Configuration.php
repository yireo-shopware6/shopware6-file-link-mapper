<?php declare(strict_types=1);

namespace Yireo\FileLinkMapper\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('yireo_file_link_mapper');

        $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('docker_path')->end()
            ->scalarNode('host_path')->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}