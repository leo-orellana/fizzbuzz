<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use App\Exceptions\FizzBuzzException;

/**
 * Description of FizzBuzz
 *
 * @author leo
 */
class FizzBuzz 
{
    
    /**
     * Returns an array containing all integers between min and max
     * but with the following conditions:
     * 
     * 1) If the number is multiples of 3 -> print "Fizz"
     * 
     * 2) If the number is multiples of 5 -> print "Buzz"
     * 
     * 3) If multiple of both -> print "FizzBuzz"
     * 
     * @param int $min
     * @param int $max
     * 
     * @return array()
     */
    public function fizzbuzz($min, $max)
    {
        try {
            $this->validate_input($min, $max);
        } catch (FizzBuzzException $ex) {
            throw $ex;
        }
        
        $result = [];
        for ($i = $min; $i <= $max; $i++) {
            $value = '';
            if($i % 3 == 0) {
                $value .= 'Fizz';
            } 
            if ($i % 5 == 0) {
                $value .= 'Buzz';
            }
            if ($value === '') {
                $value = $i;
            }
            $result[] = $value;
        }
        return $result;
    }
    
    /**
     * Validate if arguments are integers.
     * 
     * @param type $min
     * @param type $max
     * @throws FizzBuzzException
     */
    private function validate_input($min, $max)
    {
        if (! is_int($min)) {
            throw new FizzBuzzException('The first parameter is not integer.');
        }
        if (! is_int($max)) {
            throw new FizzBuzzException('The second parameter is not integer.');
        }
        if ($max < $min) {
            throw new FizzBuzzException('The first parameter must be less than or equal to the second parameter.');
        }
    }
}
