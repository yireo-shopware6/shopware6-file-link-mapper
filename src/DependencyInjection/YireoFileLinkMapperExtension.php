<?php declare(strict_types=1);

namespace Yireo\FileLinkMapper\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

class YireoFileLinkMapperExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new PhpFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.php');

        $definition = $container->getDefinition('debug.file_link_formatter');

        $configuration = new Configuration();
        $processor = new Processor();
        $config = $processor->processConfiguration($configuration, $configs);

        if ($definition->hasMethodCall('setHostPath')) {
            $hostPath = $config['host_path'] ?? '';
            $definition->addMethodCall('setHostPath', [$hostPath]);
        }

        if ($definition->hasMethodCall('setDockerPath')) {
            $dockerPath = $config['docker_path'] ?? '';
            $definition->addMethodCall('setDockerPath', [$dockerPath]);
        }
    }
}