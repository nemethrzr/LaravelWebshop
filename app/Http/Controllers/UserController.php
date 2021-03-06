<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Requests\UserSignUpRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\AddressRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;


use App\User;
use App\Address;
use App\Order;


class UserController extends Controller
{
 	use AuthenticatesUsers;

    public function getSignUp()
    {
    	
    	return view('signup');
    }
    public function postSignUp(UserSignUpRequest $request){
		$user = new User();    	
    	//$user->fill($request->all());
    	
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        
        $user->password = bcrypt($request->input('password'));

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

        $user = Auth::user();
        session('product_id','12');
        $session_product_id = session('product_id');
        $id = session('product_id');
        //$order = Auth::user()->order;
        $order = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(5);
        //dd($order);
        return view('user.show',['user'=>$user,'session_product_id'=>$session_product_id,'id'=>$id,'addresses'=>$addresses,'billing_address'=>$billing_address,'order'=>$order]);
    }
    public function postAccount(AddressRequest $request)
    {
        //cím lementése
        $address = new Address();

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
            return redirect()->route('getaccount')->with('message','Sikeresen frissítetted az adataidat!');
        }

    }
    public function postChangePassword(ChangePasswordRequest $request)
    {
        //jelszómegváltoztatás
        $oldpassword = $request['oldpassword'];
        $newpassword = bcrypt($request['password']);

        $current_password = Auth::user()->password;
        //dd($oldpassword,$newpassword,Auth::user()->password,Hash::check($oldpassword, $current_password));
        //dd(Hash::check($oldpassword, $current_password));

        if(Hash::check($oldpassword, $current_password)){
            
            $user = User::find(Auth::user()->id);
            $user->password = $newpassword;
            $user->save();
            return redirect()->back()->with('message','Sikeresen megváltoztattad a jelszavadat');
        }else{
            
            return redirect()->back()->with('warning','Nem egyezik meg a megadott jelszó a jelenlegi jelszavaddal!');
        }
    }

}
