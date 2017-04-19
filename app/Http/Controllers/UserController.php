<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Requests\UserSignUpRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;


use App\User;


class UserController extends Controller
{
 	use AuthenticatesUsers;

    public function getSignUp()
    {
    	
    	return view('signup');
    }
    public function postSignUp(UserSignUpRequest $request){
		$user = new User();    	
    	$user->fill($request->all());
    	$user->password = bcrypt($user->password);
    	if($user->save()){
    		

    		return redirect()->back()->with('message', 'Sikeresen regisztráltál, mostmár betudsz lépni az oldalra az emailcímeddel és a jelszavaddal.');
    	}

    	var_dump($request->all());
    	return view('signup',['errors'=>$errors]);


    	
    	


    	//return $this->back();
    }

    public function getSignIn(Request $request)
    {
    	return view('signin');
    }

    public function postSignIn(Request $request)
    {
    	$email=$request['email'];
    	$password=$request['password'];
    	if(Auth::attempt(['email'=>$email,'password'=>$password]))
    	{
    		return redirect()->route('home');
    	}
    	return redirect(route('getsignin'));
    }


    public function getSignOut(Request $request)    
    {
    	Auth::logout();
    	return redirect()->back();
    }


    public function getAccount(){
        $user = Auth::user();
        session('product_id','12');
        $session_product_id = session('product_id');
        $id = session('product_id');
        return view('user.show',['user'=>$user,'session_product_id'=>$session_product_id,'id'=>$id]);
    }

}
