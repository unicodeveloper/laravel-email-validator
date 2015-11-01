# laravel-email-validator

[![Latest Stable Version](https://poser.pugx.org/unicodeveloper/laravel-email-validator/v/stable.svg)](https://packagist.org/packages/unicodeveloper/laravel-email-validator)
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
    Unicodeveloper\EmailValidator\EmailValidatorServiceProvider::class,
    ...
];
```

This package also comes with a facade

```php

// Laravel 5: config/app.php

'aliases' => [
    ...
    'EmailValidator' => Unicodeveloper\EmailValidator\EmailValidatorFacade::class,
    ...
]
```

Publish the config file by running:

```bash
php artisan vendor:publish
```

The config file will now be located at `config/emailValidator.php`.

## Configuration

This is the `emailValidator.php` file in the `config` directory. Go to [quickemailverification.com](http://quickemailverification.com/), sign up, get an api Key and insert here

```php
/**
 *  Config file that a user/developer can insert quickemailverficationservice api key
 */
return [
    'apiKey' => ''
];
```

## Usage
With the Facades, all you need to do in your application is something like so:

```php

 print_r(EmailValidator::verify('kkkkk@example.com')->isValid());
 // returns Array ( [0] => [1] => Could not get MX records for domain )
 
 print_r(EmailValidator::verify('prosperotemuyiwa@gmail.com')->isValid());
 // returns Array ( [0] => 1 [1] => SMTP server accepted email address )

 var_dump( EmailValidator::verify('prosperotemuyiwa@gmail.com')->isValid()[0]); 
 // returns bool(true)
 
 var_dump( EmailValidator::verify('kkkkk@example.com')->isValid()[0]); 
 // returns bool(false)
 
 
 if( EmailValidator::verify('kkkkk@example.com')->isValid()[0] ){
   ......
 }

 // returns a true/false if the email address is valid or not
```

### Other Methods Available
```php
/**
 * Returns true or false if the email address uses a disposable domain
 * @return boolean
 */
EmailValidator::verify('kkkkk@example.com')->isDisposable()
```

```php
/**
 * Returns true or false if the API request was successful
 * @return boolean
 */
EmailValidator::verify('kkkkk@example.com')->apiRequestStatus()
```

```php
/**
 * Get the domain of the provided email address
 * @return string
 */
EmailValidator::verify('kkkkk@example.com')->getDomainName()
```

```php
/**
 * Get the local part of an email address
 * Example: kkkkk@example.com returns kkkkk
 * @return string
 */
EmailValidator::verify('kkkkk@example.com')->getUser()
```

```php
/**
 * Gets a normalized version of the email address
 * Example: KkkKk@example.com returns kkkkk@gmail.com
 * @return string
 */
EmailValidator::verify('kkkkk@example.com')->getEmailAddress()
```

```php
/**
 * Returns true if the domain appears to accept all emails delivered to that domain
 * @return boolean
 */
EmailValidator::verify('kkkkk@example.com')->acceptEmailsDeliveredToDomain()
```

```php
/**
 * Returns true or false if email address is a role address
 * Example manager@example.com , ceo@example.com will return true
 * @return boolean
 */
EmailValidator::verify('kkkkk@example.com')->isRole()
```


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Todo: Testing

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
