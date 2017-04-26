<?php

use App\Models\FizzBuzz;
use App\Exceptions\FizzBuzzException;

class FizzBuzzControllerTest extends TestCase
{
    /**
     * Check the result of call fizzbuzz endpoint passing 
     * the integers 1 and 5 as arguments.
     *
     * @return void
     */
    public function testMin1Max5()
    {
        $response = $this->call('GET', '/fizzbuzz/1/5');
        
        $expectedResult = [
            1,
            2,
            'Fizz',
            4,
            'Buzz'
        ];      

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(json_encode($expectedResult), $response->getContent());
    }
    
    /**
     * Check the result of call fizzbuzz endpoint passing
     * the integers 10 and 18 as arguments.
     * 
     * @return void
     */
    public function testMin10Max18()
    {
        $response = $this->call('GET', '/fizzbuzz/10/18');

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

       $this->assertEquals(200, $response->getStatusCode());
       $this->assertEquals(json_encode($expectedResult), $response->getContent());
    }
        
    /**
     * Verify that an HTTP response is received with status 400. 
     * The first parameter is not an integer.
     * 
     * @return void
     */
    public function testValidateFirstParameterNotInteger()
    {
        $response = $this->call('GET', '/fizzbuzz/hi/18');
        $r = json_decode($response->getContent(), TRUE);
        
        $this->assertEquals(400, $response->getStatusCode());
        $this->assertEquals('400', $r['error']['code']);
        $this->assertEquals('The parameters must be integers.', 
                $r['error']['message']);
    }
    
    /**
     * Verify that an HTTP response is received with status 400. 
     * The second parameter is not an integer.
     * 
     * @return void
     */
    public function testValidateSecondParameterNotInteger()
    {
        $response = $this->call('GET', '/fizzbuzz/465/Hello');
        $r = json_decode($response->getContent(), TRUE);
        
        $this->assertEquals(400, $response->getStatusCode());
        $this->assertEquals('400', $r['error']['code']);
        $this->assertEquals('The parameters must be integers.', 
                $r['error']['message']);
    }
    
    /**
     * Verify that an HTTP response is received with status 422. 
     * The first parameter is an integer greater than the second parameter
     * 
     * @return void
     */
    public function testValidateFirstParameterIsLessThanSecond()
    {
        $response = $this->call('GET', '/fizzbuzz/25/15');
        $r = json_decode($response->getContent(), TRUE);
        
        $this->assertEquals(422, $response->getStatusCode());
        $this->assertEquals('422', $r['error']['code']);
        $this->assertEquals('The first parameter must be less than or equal '
                . 'to the second parameter.', $r['error']['message']);
    }
}
