<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class OrderController extends Controller
{
    public function checkout($value='')
	{
    	if(Session::has('cart')){
            $products = Session::get('cart');
            //dd(response()->json($products));
            return view('webshop.checkout',['products'=>$products]);
        }


    	return redirect()->route('webshop');
    }
}
