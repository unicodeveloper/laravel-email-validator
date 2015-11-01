<?php

namespace Unicodeveloper\EmailValidator;

use InvalidArgumentException;

class EmailValidator
{
    /**
     * Gets the Current Year
     * @return integer
     */
    public function current_year()
    {
        return date("Y");
    }


}
