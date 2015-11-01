<?php

namespace Unicodeveloper\EmailValidator;

use Illuminate\Support\Facades\Facade;

class EmailValidatorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-email-validator';
    }
}