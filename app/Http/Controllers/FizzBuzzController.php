<?php

namespace App\Http\Controllers;

use Log;
use App\Models\FizzBuzz;
use Illuminate\Http\Request;
use Exception;
use App\Exceptions\FizzBuzzException;

class FizzBuzzController extends Controller
{

    /**
     * @param Request $request
     * @param int $min
     * @param int $max
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function fizzbuzz(Request $request, $min, $max)
    {
        Log::info("FizzBuzzController: min => $min, max => $max");
        
        //validate parameters
        if (!is_numeric($min) || !is_numeric($max)) {
            abort(400, 'The parameters must be integers.');
        }
        
        try {
            $FB = new FizzBuzz();
            $result = $FB->fizzbuzz(intval($min), intval($max));
        } catch (FizzBuzzException $ex) {
            abort(422, $ex->getMessage());
        } catch (Exception $ex) {
            abort(500, $ex->getMessage());
        }
        
        Log::info("FizzBuzzController returns: " . var_export($result, TRUE));
        return response()->json($result);
    }
}
