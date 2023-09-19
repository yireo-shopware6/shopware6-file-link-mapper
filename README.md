# YireoFileLinkMapper

**Shopware 6 plugin that allows you to map the file paths used by for instance the Symfony Profiler. For instance, when Shopware is running inside Docker, this plugin allows you to change the internal Docker path to Shopware towards the host path used by PHPStorm.** 

### Installation
```bash
composer require yireo/shopware6-file-link-mapper --dev
bin/console plugin:refresh
bin/console plugin:install --activate YireoFileLinkMapper
```

### Configuration
File `config/packages/yireo_file_link_mapper.yaml`
```yaml
when@dev:
    yireo_file_link_mapper:
        docker_path: "/var/www/html"
        host_path: "/home/foobar/my-project"
```