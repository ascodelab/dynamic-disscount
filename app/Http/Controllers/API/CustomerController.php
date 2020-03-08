<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//importing models
use App\Customer;
use App\Discount;

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
    public function create(Request $request){
        
        //check if customer already exists
        if($this->customerExists($request)){
            // response if user already exists
            $response = ['status'=>'fail','message'=>'Given phone number or email address has been used previously.'];
            return json_encode($response);
        }

        //getting the discount value
        $discount = $this->getDiscount();
        // show error message if discount not available
        if(!$discount){
            $response = ['status'=>'fail','message'=>'All discount values have already been given, no more discount values left.'];
            return json_encode($response);
        }
        //updating the used discount
        $this->updateDiscountByValue($discount);
        // creating customer and assigning discount value to it
        return $this->createCustomer($request,$discount);

    }
    //check if coustome exist
    protected function customerExists($data){

        $customer = Customer::where('email',$data->email)->orWhere('phone',$data->phone)->first();
        if($customer) return true;
        // return false if does not customer does not exists
        return false;
    }
    //creating customer if does not exist into databse

    protected function createCustomer($request,$discount){
        //merge discount and customer info
        //creating customer
        $data = [
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'discount'=>$discount
                ];
        //inserting into databse
        Customer::create($data);
        //returning response
        $response = ["status"=>"success","message"=>"Whooo! We have given a discount of Rs. $discount"];
        return json_encode($response);
    }
    //get discount on the base of probability
    protected function getDiscount(){ 
        //retriving discounts data in the key value pair
        $discounts = Discount::where('remaining', '!=' , 0)->get()->pluck('remaining','value');
        $discounts = $discounts->all();
        
        $random = array();
        // setting the frequency of values
        foreach($discounts as $key => $value) {
            for($i = 0; $i < $value; $i++) {
                $random[] = $key;
            }
        }  
        shuffle($random);
        if(empty($random)){
            return false;
        }
        return $random[0];
    }
    //update discount remaing
    protected function updateDiscountByValue($value){

        $discount = Discount::where('value', '=', $value)->first();
        $discount->remaining = $discount->remaining - 1 ;

        // updating the the value
        return $discount->update();

    }
    
}