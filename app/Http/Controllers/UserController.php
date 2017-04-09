<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;


class UserController extends Controller
{
    public function getSignUp()
    {
    	
    	return view('signup');
    }
    public function postSignUp(Request $request){
    	$data['first_name'] = $request['first_name'];
    	$data['last_name']  = $request['last_name'];
    	$data['zipcode']      = $request['zipcode'];
    	$data['city']      = $request['city'];
    	$data['email']      = $request['email'];
    	$data['password']      = $request['password'];

var_dump($request->all());
    	$user = new User();
    	$user->save($request->all());
    	//$user->fill($request->all());
    	//$user->save();


    	/*$this->validate($request,[
    		'last_name'=>'required',
    		'last_name'=>'required',
    		'email'=>'required',
    		'zipcode'=>'numeric|max:4',
    		]);*/
    	


    	//return $this->back();
    }
}
