# YireoFileLinkMapper

**Shopware 6 plugin that allows you to map the file paths used by for instance the Symfony Profiler. For instance, when Shopware is running inside Docker, this plugin allows you to change the internal Docker path to Shopware towards the host path used by PHPStorm.** 

### Installation
```bash
composer require yireo/shopware6-file-link-mapper --dev
bin/console plugin:refresh
bin/console plugin:install --activate YireoFileLinkMapper
```

### Proof of concept
Symfony allows you to set an IDE per configuration, so that - when using the Symfony Profiler toolbar - links are opened up in, for example, PHPStorm. This is done by configuring a file `config/packages/dev/framework.yaml` like so:
```yaml
framework:
    ide: phpstorm
```

If you are using a Docker-based development environment, where the PHP processes are run inside a Docker container, then all the links will be generated with a path pointing towards the Docker container folder (for example `/var/www/html`) and not the host folder (for example `/home/foobar/my-project`). This plugin allows you to fix this.

### Configuration
File `config/packages/yireo_file_link_mapper.yaml`
```yaml
when@dev:
    yireo_file_link_mapper:
        docker_path: "/var/www/html"
        host_path: "/home/foobar/my-project"
```

