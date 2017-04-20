<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Cart;
use Session;

class WebshopController extends Controller
{
    public function index($value='')    
    {    	
    	return view('webshop.index');
    }

    public function getProducts($category_slug){
    	
    	
    	$categories = Category::where('slug',$category_slug)->with('products')->first();    	
    	
    	
    	return view('webshop.productlist',['products'=>$categories->products]);
    }
    public function getCart()
    {
        if(Session::has('cart')){
            $products = Session::get('cart');
            return view('webshop.shoppingcart',['products'=>$products]);
        }
        return redirect()->back();
    	
    }


    public function getAddToCart(Request $request, $id,$qty=1){
        $product = Product::find($id);
        $oldCart = Session::has('cart')?Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id,$qty);
        
        $request->session()->put('cart',$cart);
        
        if($request->ajax()){
            return $cart;
        }
        return redirect()->back();

    }
    public function getRemoveFromCart($id)
    {
        Session::remove('cart');
        return view('webshop.index');
    }
}
