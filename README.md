# Chelsymooy deposits

**Chelsymooy deposits** is a flexible plans and deposit management system for Laravel, with the required tools to run your SAAS like services efficiently. It's simple architecture, accompanied by powerful underlying to afford solid platform for your business.

[![Packagist](https://img.shields.io/packagist/v/chelsymooy/laravel-deposits.svg?label=Packagist&style=flat-square)](https://packagist.org/packages/chelsymooy/laravel-deposits)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/chelsymooy/laravel-deposits.svg?label=Scrutinizer&style=flat-square)](https://scrutinizer-ci.com/g/chelsymooy/laravel-deposits/)
[![Travis](https://img.shields.io/travis/chelsymooy/laravel-deposits.svg?label=TravisCI&style=flat-square)](https://travis-ci.org/chelsymooy/laravel-deposits)
[![StyleCI](https://styleci.io/repos/93313402/shield)](https://styleci.io/repos/93313402)
[![License](https://img.shields.io/packagist/l/chelsymooy/laravel-deposits.svg?label=License&style=flat-square)](https://github.com/chelsymooy/laravel-deposits/blob/develop/LICENSE)


## Considerations

- Payments are out of scope for this package.
- You may want to extend some of the core models, in case you need to override the logic behind some helper methods like `renew()`, `cancel()` etc. E.g.: when cancelling a deposit you may want to also cancel the recurring payment attached.


## Installation

1. Install the package via composer:
    ```shell
    composer require chelsymooy/laravel-deposit
    ```

2. Publish resources (migrations and config files):
    ```shell
    php artisan vendor:publish
    ```

3. Add service provider in config/app.php:
    ```shell
    Chelsymooy\Deposit\Providers\DepositServiceProvider::class,
    ```

4. Execute migrations via the following command:
    ```shell
    php artisan migrate
    ```

5. Done!


## Usage

### New deposit

(COMING SOON)

### Recurring Bill

(COMING SOON)

### Activate deposit as Middleware

(COMING SOON)

### Send Bill to User Email

(COMING SOON)

### Frontend Hook

(COMING SOON)

### Scopes

### Models

**Chelsymooy deposits** uses 4 models:

```php
Chelsymooy\deposits\Models\Plan;
Chelsymooy\deposits\Models\PlanPrice;
Chelsymooy\deposits\Models\deposit;
Chelsymooy\deposits\Models\Bill;
```

## Changelog

Refer to the [Changelog](CHANGELOG.md) for a full history of the project.


## Support

The following support channels are available at your fingertips:

- [Help on Email](mailto:mooychelsy@gmail.com)
- [Follow on Twitter](https://twitter.com/cmooy)


## Contributing & Protocols

Thank you for considering contributing to this project! The contribution guide can be found in [CONTRIBUTING.md](CONTRIBUTING.md).

Bug reports, feature requests, and pull requests are very welcome.

- [Versioning](CONTRIBUTING.md#versioning)
- [Pull Requests](CONTRIBUTING.md#pull-requests)
- [Coding Standards](CONTRIBUTING.md#coding-standards)
- [Feature Requests](CONTRIBUTING.md#feature-requests)
- [Git Flow](CONTRIBUTING.md#git-flow)


## Security Vulnerabilities

If you discover a security vulnerability within this project, please send an e-mail to [mooychelsy@gmail.com](mooychelsy@gmail.com). All security vulnerabilities will be promptly addressed.


## About Chelsymooy

Chelsymooy is a software developer specialized in web & android applications.


## License

This software is released under [The MIT License (MIT)](LICENSE).

(c) 2020 Chelsymooy LLC, Some rights reserved.
