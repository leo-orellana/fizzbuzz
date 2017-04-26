<?php

use App\Models\FizzBuzz;
use App\Exceptions\FizzBuzzException;

class FizzBuzzModelTest extends TestCase
{
    /**
     * Check the result of executing fizzbuzz by passing 
     * the integers 1 and 5 as parameters.
     *
     * @return void
     */
    public function testMin1Max5()
    {
        $FB = new FizzBuzz();
        $result = $FB->fizzbuzz(1, 5);
        
        $expectedResult = [
            1,
            2,
            'Fizz',
            4,
            'Buzz'
        ];      

        $this->assertEquals($expectedResult, $result);
    }
    
    /**
     * Check the result of executing fizzbuzz by passing 
     * the integers 10 and 18 as parameters.
     * 
     * @return void
     */
    public function testMin10Max18()
    {
        $FB = new FizzBuzz();
        $result = $FB->fizzbuzz(10, 18);

        $expectedResult = [
            'Buzz',
            11,
            'Fizz',
            13,
            14,
            'FizzBuzz',
            16,
            17,
            'Fizz'
        ];      

       $this->assertEquals($expectedResult, $result);
    }
        
    /**
     * Verifies that a FizzBuzzException is raised by validating that
     * the first parameter is not an integer.
     * 
     * @return void
     */
    public function testValidateFirstParameterNotInteger()
    {
        $FB = new FizzBuzz();
        try {
            $FB->fizzbuzz(23.2, 18);
            $this->fail();
        } catch (FizzBuzzException $exc) {
            $this->assertEquals('The first parameter is not integer.', 
                    $exc->getMessage());
        }
    }
    
    /**
     * Verifies that a FizzBuzzException is raised by validating that
     * the second parameter is not an integer.
     * 
     * @return void
     */
    public function testValidateSecondParameterNotInteger()
    {
        $FB = new FizzBuzz();
        try {
            $FB->fizzbuzz(2, 34.2);
            $this->fail();
        } catch (FizzBuzzException $exc) {
            $this->assertEquals('The second parameter is not integer.', 
                    $exc->getMessage());
        }
    }
    
    /**
     * Verifies that a FizzBuzzException is raised by validating that 
     * the first parameter is an integer greater than the second parameter
     * 
     * @return void
     */
    public function testValidateFirstParameterIsLessThanSecond()
    {
        $FB = new FizzBuzz();
        try {
            $FB->fizzbuzz(25, 15);
            $this->fail();
        } catch (FizzBuzzException $exc) {
            $this->assertEquals('The first parameter must be less than or equal'
                    . ' to the second parameter.', $exc->getMessage());
        }
    }
}
