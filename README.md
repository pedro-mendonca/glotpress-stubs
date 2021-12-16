# GlotPress Stubs

GlotPress function and class declaration stubs for static analysis. 

[![Packagist version](https://img.shields.io/packagist/v/pedro-mendonca/glotpress-stubs?label=Packagist)](https://packagist.org/packages/pedro-mendonca/glotpress-stubs)
[![Packagist stats](https://img.shields.io/packagist/dt/pedro-mendnoca/glotpress-stubs?label=Downloads)](https://packagist.org/packages/pedro-mendonca/glotpress-stubs/statss)
[![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/pedro-mendonca/glotpress-stubs?label=PHP&logo=PHP&logoColor=white)](https://packagist.org/packages/pedro-mendonca/glotpress-stubs)
[![License](https://img.shields.io/github/license/pedro-mendonca/glotpress-stubs?label=License)](https://github.com/pedro-mendonca/glotpress-stubs/blob/main/LICENSE)
[![Sponsor](https://img.shields.io/badge/GitHub-🤍%20Sponsor-ea4aaa?logo=github)](https://github.com/sponsors/pedro-mendonca)

This package provides stub declarations for [GlotPress](https://glotpress.blog) functions, classes and interfaces.  
These stubs can help plugin and theme developers leverage static analysis tools like [PHPStan](https://github.com/phpstan/phpstan), which are unable to parse GlotPress as it is not clean OOP code.  

Stubs are generated directly from the [source](https://github.com/GlotPress/GlotPress-WP) using [php-stubs/generator](https://github.com/php-stubs/generator).

### Requirements

- PHP >=7.1

### Installation

Require this package as a development dependency with [Composer](https://getcomposer.org).

```bash
composer require --dev pedro-mendonca/glotpress-stubs
```

Alternatively you may download `glotpress-stubs.php` directly.

### Usage in PHPStan

Include all stubs in PHPStan configuration file.  
You can remove the `# WordPress Stubs` lines if you already use [WordPress extensions for PHPStan](https://github.com/szepeviktor/phpstan-wordpress).  

```yaml
parameters:
    scanFiles:
        # WordPress Stubs
        - %rootDir%/../../php-stubs/wordpress-stubs/wordpress-stubs.php
        # GlotPress Stubs
        - %rootDir%/../../pedro-mendonca/glotpress-stubs/glotpress-stubs.php
```
