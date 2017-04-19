<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Products;
use App\Cart;

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
    	return view('webshop.shoppingcart');
    }


    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart')?Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);

        $request->session()->put('cart',$cart);
        return redirect()->back();

    }
}
