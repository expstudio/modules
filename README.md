Clone from Caffeinated Modules
===================

# Expstudio Modules
[![Lumen 5.4](https://img.shields.io/badge/Lumen-5.4-orange.svg?style=flat-square)](http://lumen.laravel.com)
[![Source](http://img.shields.io/badge/source-expstudio/modules-blue.svg?style=flat-square)](https://github.com/expstudio/modules)
[![License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://tldrlegal.com/license/mit-license)

Expstudio Modules is a simple package to allow the means to separate your Lumen 5.4 application out into modules. Each module is completely self-contained allowing the ability to simply drop a module in for use.

The package follows the FIG standards PSR-1, PSR-2, and PSR-4 to ensure a high level of interoperability between shared PHP code.

## Documentation
You will find user friendly and updated documentation in the wiki here: [Caffeinated Modules Wiki](https://github.com/caffeinated/modules/wiki)

## Quick Installation
Begin by installing the package through Composer.

```
composer require expstudio/lumen-modules
```

Once this operation is complete, simply add both the service provider and facade classes to your project's `bootstrap/app.php` file:

#### Service Provider

```php
$app->register(Expstudio\Modules\ModulesServiceProvider::class);
```

#### Facade

```php

$app->withFacades(true, [Expstudio\Modules\Facades\Module::class => 'Module']);
```

And that's it! With your coffee in reach, start building out some awesome modules!

#### Add Module 
```php
$app->register(App\Modules\[ModuleName]\Providers\ModuleServiceProvider::class);
```
