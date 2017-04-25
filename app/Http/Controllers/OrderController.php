<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\CheckoutRequest;
use App\Address;
use App\PaymentType;
use App\ShippingMethod;
use App\Order;
use App\OrderProduct;
use Auth;

class OrderController extends Controller
{
    public function getCheckout($value='')
	{
		/*$addresses = Address::where('user_id',Auth::user()->id)->get();
		if(!$addresses){
			$addresses[0] = new Address();
			$addresses[0]->type = 'billing';
			$addresses[1] = new Address();
			$addresses[1]->type = 'shipping';
		}
	
		$shipping_address = 0;
		$billing_address  = 0;
		if($addresses){		
			foreach ($addresses as $item) {
				if($item->type=='shipping'){
					$shipping_address = $item;
				}elseif($item->type=='billing'){
					$billing_address = $item;
				}
			}
		}*/

		$addresses      = Address::where('user_id',Auth::user()->id)->get();
        $paymenttypes   = PaymentType::all();
        $shippingmethods= ShippingMethod::all();

    	if(Session::has('cart')){
            $products = Session::get('cart');
            //dd(response()->json($products));
            return view('webshop.checkout',['products'=>$products,'addresses'=>$addresses,'paymenttypes'=>$paymenttypes,'shippingmethods'=>$shippingmethods]);
        }


    	return redirect()->route('webshop');
    }
    private function AddressInput($request){
    	$billing_address  = array();
    	$shipping_address = array();
    	foreach ($request as $key => $value) {
    		
    		$billing_address[$key]  = $value[1];

			$shipping_address[$key] = $value[0];
    	}
    	unset($billing_address['_token']);
    	$billing_address['user_id'] = Auth::user()->id;

    	unset($shipping_address['_token']);
    	$shipping_address['user_id'] = Auth::user()->id;
    	$return[0]=$shipping_address;
    	$return[1]=$billing_address;
    	return $return;
    }
    public function postCheckout(CheckoutRequest $request)
    {
    	if(Session::has('cart')){
            $cart = Session::get('cart');

           
            $cart->shipping_method_id   = $request->input('shipping_method_id');
            $cart->payment_type_id      = $request->input('payment_type_id');
            $cart->shipping_address_id  = $request->input('shipping_address_id');
            $cart->billing_address_id   = $request->input('billing_address_id');
            $request->session()->put('cart',$cart);

            if(true){//ha minden feltétel igaz lesz, tehát megfelelő és létező address_id,payment_type_id-k ...stb ezeket majd még valahol, vagy itt de elllenőrizni kell majd





                return redirect()->back();
            }
            dd($cart);

        }else{
            throw new Exception("Error Processing Request", 1);
            
        }

        

    	//return redirect()->back();
    }
}
