<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//importing models
use App\Discount;

class DiscountController extends Controller
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
    public function seed(){

        $data = array(
            array('value'=>50, 'remaining'=>15),
            array('value'=>100, 'remaining'=>12),
            array('value'=>200, 'remaining'=>10),
            array('value'=>500, 'remaining'=>8),
            array('value'=>1000, 'remaining'=>5),
            array('value'=>2000, 'remaining'=>4),
            array('value'=>5000, 'remaining'=>2),
            array('value'=>10000, 'remaining'=>1),
        );
        
        Discount::insert($data);

        return array("status"=>"Discount values inserted!");
        
    }
    
}