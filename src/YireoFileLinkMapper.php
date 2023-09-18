<?php declare(strict_types=1);

namespace Yireo\FileLinkMapper;

use Shopware\Core\Framework\Plugin;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Yireo\FileLinkMapper\DependencyInjection\YireoFileLinkMapperExtension;

class YireoFileLinkMapper extends Plugin
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new YireoFileLinkMapperExtension();
    }
}
