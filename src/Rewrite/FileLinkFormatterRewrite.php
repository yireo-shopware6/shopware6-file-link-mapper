<?php declare(strict_types=1);

namespace Yireo\FileLinkMapper\Rewrite;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpKernel\Debug\FileLinkFormatter;
use Symfony\Contracts\Service\Attribute\Required;

class FileLinkFormatterRewrite extends FileLinkFormatter
{
    private $hostPath = '';
    private $dockerPath = '';
    protected array|false $fileLinkFormat = [];

    public function format(string $file, int $line): string|bool
    {
        if (!empty($this->hostPath) && !empty($this->dockerPath)) {
            $file = str_replace($this->dockerPath, $this->hostPath, $file);
        }

        return parent::format($file, $line);
    }

    #[Required]
    public function setDockerPath(#[Autowire('%yireo_file_link_mapper.docker_path%')] string $dockerPath = '/var/www/html'): void
    {
        $this->dockerPath = $dockerPath;
    }

    #[Required]
    public function setHostPath(#[Autowire('%yireo_file_link_mapper.host_path%')] string $hostPath = ''): void
    {
        //echo 'host path '.$hostPath;exit;
        $this->hostPath = $hostPath;
    }
}