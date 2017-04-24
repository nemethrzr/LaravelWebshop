<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests\AddressRequest;
use App\Address;
use Auth;

class OrderController extends Controller
{
    public function getCheckout($value='')
	{
		$addresses = Address::where('user_id',Auth::user()->id)->get();
	
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
		}

    	if(Session::has('cart')){
            $products = Session::get('cart');
            //dd(response()->json($products));
            return view('webshop.checkout',['products'=>$products,'shipping_address'=>$shipping_address,'billing_address'=>$billing_address,'addresses'=>$addresses]);
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
    public function postCheckout(Request $request)
    {
    	//dd($this->AddressInput($request->all()));
    	$address = $this->AddressInput($request->all());
    	Address::updateOrCreate(['user_id' => Auth::user()->id,'type'=>'billing'],$address[0]);
    	Address::updateOrCreate(['user_id' => Auth::user()->id,'type'=>'shipping'],$address[1]);

    	



		//$billing_address  = Address::where(['user_id'=>Auth::user()->id,'type'=>'billing'])->get();
		/*$billing_address  = Address::where('users_id',Auth::user()->id)
							->where('type','billing')->get();




		$shipping_address = Address::where('user_id',Auth::user()->id)->where('type','shipping')->get();





		/*if($billing_address && $shipping_address){

			$billing_address->zipcode       = $request->input('billing_zipcode');
	    	$billing_address->city          = $request->input('billing_city');
	    	$billing_address->street        = $request->input('billing_street');
	    	$billing_address->street_number = $request->input('billing_streetnumber');
	    	$billing_address->update();	    	

    		$shipping_address->zipcode       = $request->input('shipping_zipcode');
	    	$shipping_address->city          = $request->input('shipping_city');
	    	$shipping_address->street        = $request->input('shipping_street');
	    	$shipping_address->street_number = $request->input('shipping_streetnumber');
	    	//Address::create($shipping_address);
	    	//$shipping_address->save();
	    	return redirect()->back()->with('message','Sikeresen módosítotad az adatokat');
		}*/

    	//cím lementése
    	/*$address = new Address();

    	$address->zipcode       = $request->input('shipping_zipcode');
    	$address->city          = $request->input('shipping_city');
    	$address->street        = $request->input('shipping_street');
    	$address->street_number = $request->input('shipping_streetnumber');
    	$address->user_id       = Auth::user()->id;
    	$address->type          = 'shipping';

    	$address->save();

		$billing_address = new Address();
    	$billing_address->zipcode       = $request->input('billing_zipcode');
    	$billing_address->city          = $request->input('billing_city');
    	$billing_address->street        = $request->input('billing_street');
    	$billing_address->street_number = $request->input('billing_streetnumber');
    	$billing_address->user_id       = Auth::user()->id;
    	$billing_address->type          = 'billing';

    	if($billing_address->save()){
    		return redirect()->back()->with('message','Sikeres');
    	}
*/
    	return redirect()->back();
    }
}
