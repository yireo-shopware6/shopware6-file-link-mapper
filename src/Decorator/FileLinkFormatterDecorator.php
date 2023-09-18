<?php declare(strict_types=1);

namespace Yireo\FileLinkMapper\Decorator;

use Symfony\Component\HttpKernel\Debug\FileLinkFormatter;

class FileLinkFormatterDecorator extends FileLinkFormatter
{
    protected string $hostPath = '';
    protected string $dockerPath = '';

    public function format(string $file, int $line): string|bool
    {
        if (!empty($this->hostPath) && !empty($this->dockerPath)) {
            $file = str_replace($this->dockerPath, $this->hostPath, $file);
        }

        return parent::format($file, $line);
    }

    public function setHostPath(string $hostPath): void
    {
        $this->hostPath = $hostPath;
    }

    public function setDockerPath(string $dockerPath): void
    {
        $this->dockerPath = $dockerPath;
    }
}