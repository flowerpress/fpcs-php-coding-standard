# The FPCS PHP coding standard

![Packagist Version](https://img.shields.io/packagist/v/fpcs/php-coding-standard) ![PHP from Packagist](https://img.shields.io/packagist/php-v/fpcs/php-coding-standard) ![Packagist Downloads](https://img.shields.io/packagist/dt/fpcs/php-coding-standard) ![Packagist License](https://img.shields.io/packagist/l/fpcs/php-coding-standard)

## Installation

### Install package:

`composer require --dev fpcs/php-coding-standard`

### Implement standards:

#### ./phpcs.xml:

```
<?xml version="1.0"?>
<ruleset>
    <rule ref="vendor/fpcs/php-coding-standard/phpcs" />
</ruleset>
```

#### ./easy-coding-standard.yaml:

```
imports:
    - { resource: 'vendor/symplify/easy-coding-standard/config/set/psr2.yaml' }
    - { resource: 'vendor/symplify/easy-coding-standard/config/set/clean-code.yaml' }
    - { resource: 'vendor/fpcs/php-coding-standard/easy-coding-standard/*.yaml' }
```

### Selecting specific standards:

There are `base` standards, and then more specific standards, which should be used IN ADDITION to the `base` standard.

Available standards:

1. `base` (always use)
1. `laravel`

#### ./phpcs.xml:

```
<?xml version="1.0"?>
<ruleset>
    <rule ref="vendor/fpcs/php-coding-standard/phpcs/base.xml" />
    <rule ref="vendor/fpcs/php-coding-standard/phpcs/laravel.xml" />
</ruleset>
```

#### ./easy-coding-standard.yaml:

```
imports:
    - { resource: 'vendor/symplify/easy-coding-standard/config/set/psr2.yaml' }
    - { resource: 'vendor/symplify/easy-coding-standard/config/set/clean-code.yaml' }
    - { resource: 'vendor/fpcs/php-coding-standard/easy-coding-standard/base.yaml' }
    - { resource: 'vendor/fpcs/php-coding-standard/easy-coding-standard/laravel.yaml' }
```

### Automate:

#### package.json:

```
  "scripts": {
    ...
    "ecs": "./vendor/bin/ecs check ./ --fix",
    "phpcbf": "./vendor/bin/phpcbf ./",
    "phpcs": "./vendor/bin/phpcs -sp ./",
    "lint": "yarn ecs && yarn phpcbf",
    ...
  },
```

#### lint-stagerd.config.js:

```
module.exports = {
    '*.php': files => [
        `./vendor/bin/ecs check --fix "${files.join('" "')}"`,
        `./vendor/bin/phpcbf "${files.join('" "')}"`,
        `git add "${files.join('" "')}"`,
    ],
};
```

## Run it:

`yarn lint`
