<?php declare(strict_types=1);

namespace Yireo\FileLinkMapper\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Yireo\FileLinkMapper\Rewrite\FileLinkFormatterRewrite;

class CompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $originalService = $container->getDefinition('debug.file_link_formatter');

        $newService = new Definition(FileLinkFormatterRewrite::class);
        $newService->setArguments($originalService->getArguments());
        $newService->setAutowired(true);
        $newService->setAutoconfigured(true);

        $container->setDefinition('debug.file_link_formatter', $newService);
    }
}