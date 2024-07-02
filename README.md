# Filament Model Audit

[![Latest Version on Packagist](https://img.shields.io/packagist/v/beranidigital/filament-model-audit.svg?style=flat-square)](https://packagist.org/packages/beranidigital/filament-model-audit)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/beranidigital/filament-model-audit/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/beranidigital/filament-model-audit/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/beranidigital/filament-model-audit/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/beranidigital/filament-model-audit/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/beranidigital/filament-model-audit.svg?style=flat-square)](https://packagist.org/packages/beranidigital/filament-model-audit)



Automatically audits all model change for Filament
Designed for install and forget, if you want to customize it use [bearnidigital/laravel-model-audit](https://github.com/beranidigital/laravel-model-audit) instead



## Installation

You can install the package via composer:

```bash
composer require beranidigital/filament-model-audit
```

Publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-model-audit-migrations"
php artisan migrate
```




## Usage

```php
public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            \BeraniDigitalID\FilamentModelAudit\FilamentModelAuditPlugin::make()
            ->setResourceNavigationGroup('settings')
            ->setResourceNavigationIcon(null)
            ->setResourceNavigationSort(2)
        ]);
};
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Yusuf Sekhan Althaf](https://github.com/Ticlext-Altihaf)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
