<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Address;

class AddressController extends Controller
{
    public function getAddress()
    
    {
    	//return Address::where('user_id',Auth::user()->id)->get();
    }
    public function postAddress(Request $request)
    {
    	//dd($request->all());
    	$address = new Address();
    	$address->fill($request->all());

    	$address->user_id = Auth::user()->id;
    	$address->save();
    	return redirect()->back();
    }
    public function getDeleteAddress($address_id)
    {
    	Address::destroy($address_id);
    	return redirect()->back();
    }

    
}
