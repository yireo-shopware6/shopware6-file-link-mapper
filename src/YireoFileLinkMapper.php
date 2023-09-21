<?php declare(strict_types=1);

namespace Yireo\FileLinkMapper;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Yireo\FileLinkMapper\DependencyInjection\CompilerPass;
use Yireo\FileLinkMapper\DependencyInjection\Extension;

final class YireoFileLinkMapper extends Bundle
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
