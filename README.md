# laravel-email-validator

[![Latest Stable Version](https://poser.pugx.org/busayo/laravel-yearly/v/stable.svg)](https://packagist.org/packages/unicodeveloper/laravel-email-validator)
![](https://img.shields.io/badge/unicodeveloper-approved-brightgreen.svg)
[![License](https://poser.pugx.org/unicodeveloper/laravel-email-validator/license.svg)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/unicodeveloper/laravel-email-validator.svg)](https://travis-ci.org/unicodeveloper/laravel-email-validator)
[![Quality Score](https://img.shields.io/scrutinizer/g/unicodeveloper/laravel-email-validator.svg?style=flat-square)](https://scrutinizer-ci.com/g/unicodeveloper/laravel-email-validator)
[![Total Downloads](https://img.shields.io/packagist/dt/unicodeveloper/laravel-email-validator.svg?style=flat-square)](https://packagist.org/packages/unicodeveloper/laravel-email-validator)

> Laravel 5 Package to help validate and verify your email addresses.

## Install

[PHP](https://php.net) 5.5+ or [HHVM](http://hhvm.com) 3.3+, and [Composer](https://getcomposer.org) are required.

Via Composer

``` bash
$ composer require unicodeveloper/laravel-email-validator
```

Another alternative is to simply add the following line to the require block of your `composer.json` file.

```
"unicodeveloper/laravel-email-validator": "1.0.*"
```

Then run `composer install` or `composer update` to download it and have the autoloader updated.

Add this to your providers array in `config/app.php`

```php

// Laravel 5: config/app.php

'providers' => [
    ...
    'Unicodeveloper\EmailValidator\EmailValidatorServiceProvider',
    ...
];
```

This package also comes with a facade

```php

// Laravel 5: config/app.php

'aliases' => [
    ...
    'EmailValidator' => 'Unicodeveloper\EmailValidator\EmailValidatorFacade',
    ...
]
```

## Usage

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

You can run the tests with:

```bash
vendor/bin/phpunit run
```

Alternatively, you can run the tests like so:

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Prosper Otemuyiwa](https://twitter.com/unicodeveloper)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
