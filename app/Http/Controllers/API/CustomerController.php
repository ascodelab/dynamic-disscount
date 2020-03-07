<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//importing models
use App\User;

class CustomerController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    //store new user into database if does not exist
    public function create(){

        $probabilities = array(
            1 => 40,
            2 => 10,
            3 => 25,
            4 => 5,
            5 => 10,
            6 => 10
        );
        
        $random = array();
        foreach($probabilities as $key => $value) {
            for($i = 0; $i < $value; $i++) {
                $random[] = $key;
            }
        }
        
        shuffle($random);
        echo $random[0];
        
    }
}