<?php declare(strict_types=1);

namespace Yireo\FileLinkMapper;

use Shopware\Core\Framework\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Yireo\FileLinkMapper\DependencyInjection\CompilerPass;
use Yireo\FileLinkMapper\DependencyInjection\Extension;

final class YireoFileLinkMapper extends Plugin
{
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new CompilerPass());
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return new Extension();
    }
}
