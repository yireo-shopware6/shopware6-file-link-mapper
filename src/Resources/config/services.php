<?php declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Yireo\FileLinkMapper\Decorator\FileLinkFormatterDecorator;

return function(ContainerConfigurator $container): void {
    $services = $container->services();
    $services->set('debug.file_link_formatter', FileLinkFormatterDecorator::class)
        ->args([
            param('debug.file_link_format'),
            service('request_stack')->ignoreOnInvalid(),
            param('kernel.project_dir'),
            '/_profiler/open?file=%%f&line=%%l#line%%l',
        ])
    ;
};
