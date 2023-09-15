<?php declare(strict_types=1);

namespace Yireo\FileLinkMapper\Decorator;

use Symfony\Component\HttpKernel\Debug\FileLinkFormatter;

class FileLinkFormatterDecorator extends FileLinkFormatter
{
    public function format(string $file, int $line): string|bool
    {
        $file = str_replace('/var/www/html', '/data/html/sw6-pollux', $file);
        return parent::format($file, $line);
    }
}