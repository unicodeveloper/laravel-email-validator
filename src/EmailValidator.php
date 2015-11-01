<?php

namespace Unicodeveloper\Yearly;

use InvalidArgumentException;

class YearAfterYear
{
    /**
     * Gets the Current Year
     * @return integer
     */
    public function current_year()
    {
        return date("Y");
    }



    /**
     *  returns a range of years when provided a start year
     * @param  integer $start_year
     * @param  string $separator
     * @return string
     * @throws \InvalidArgumentException
     */
    public function year_range($start_year = 0, $separator = ' - ')
    {

        if(! is_numeric($start_year)){
            throw new InvalidArgumentException("Invalid Argument Format passed . It should be a number");
        }

        if( $start_year < 0){
            throw new InvalidArgumentException("Invalid Argument passed {$start_year} . It shouldn't be a negative value");
        }

        if( $start_year == 0){
            return $this->current_year();
        }

      return ($start_year == $this->current_year()) ? $this->current_year() : $start_year . $separator . $this->current_year();
    }
}
