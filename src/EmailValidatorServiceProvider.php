<?php

namespace Unicodeveloper\EmailValidator;

use Illuminate\Support\ServiceProvider;
use Unicodeveloper\EmailValidator\EmailValidator;

class EmailValidatorServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Publishes all the config file this package needs to function
     * @return void
     */
    public function boot()
    {
        $config = realpath(__DIR__.'/../resources/config/emailValidator.php');

        $this->publishes([
            $config => config_path('emailValidator.php')
        ]);
    }

    /**
     * Register the application services
     * @return void
     */
    public function register()
    {
        $this->app->bind('laravel-email-validator', function(){

            return new EmailValidator;

        });
    }

    /**
     * Get the services provided by the provider
     * @return array
     */
    public function provides()
    {
        return ['laravel-email-validator'];
    }
}