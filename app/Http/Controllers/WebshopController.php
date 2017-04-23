<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Cart;
use Session;
use DB;
use Illuminate\Pagination\Paginator;
use Storage;
use Illuminate\Http\Response;

class WebshopController extends Controller
{
    private $paginatePage = 12;
    public function index($value='')    
    {    	
    	return view('webshop.index');
    }

    public function getProducts($category_slug){
    	
    	
    	/*$categories = Category::where('slug',$category_slug)->with('products')->first();   
       
        $products = Category::where('slug',$category_slug)->with('products')->paginate(10);

        /*Category::where('slug',$category_slug)->with(['products']=>function($query){

        })*/

        /*$products = Product::with('categories',function($query){
            $query->where('slug',$category_slug);
        })->paginate(10);*/
        
        /*$products = DB::table('products')
            ->join('categories',function($join) use($category_slug){
                $join->on('products.category_id','=','categories.id')
                    ->where('categories.slug','=',$category_slug);
            })->select('products.id','products.name','products.description')->paginate($this->paginatePage);
           */

            
            $products = Product::with('category')
            ->join('categories','products.category_id','categories.id')
            ->where('categories.slug',$category_slug)
            ->select(['products.id','products.name','products.description','products.price','categories.slug AS category_slug','products.slug'])
            ->paginate($this->paginatePage);

            $category = Category::where('slug',$category_slug)->select(['name','slug'])->first();
            
            if(!$products->isEmpty()){
                return view('webshop.productlist',['products'=>$products,'category'=>$category]);        
            }
        return redirect()->route('home');

            
        

        //return view('webshop.productlist',['products'=>$products,'category_name'=>$category_name,'category_slug'=>$category_slug]);


            //);
 
    	//$users = DB::table('categories')->where('slug',$category_slug)->paginate(15);
    	
    	//return view('webshop.productlist',['products'=>$categories->products]);
    }
    public function getProduct($category_slug,$product_slug,$product_id){
        $product = Product::with('category')
        ->where('products.id',$product_id)
        ->join('categories','categories.id','products.category_id')
        ->select(['products.id','products.name','products.description','products.price','categories.slug AS category_slug','categories.name AS category_name','products.slug'])->first();
        if(!empty($product))
            return view('webshop.productdetail',['product'=>$product]);
        else return redirect()->route('webshop');
    }
    public function getCart()
    {
        if(Session::has('cart')){
            $products = Session::get('cart');
            //dd(response()->json($products));
            return view('webshop.shoppingcart',['products'=>$products]);
        }

        return redirect()->back();
    	
    }

/* handle get and ajax get requests */
    /*public function getAddToCart(Request $request, $id,$qty){
       // $product = Product::find($id)->with('category')->first();



        $product = Product::with('category')
        ->where('products.id',$_id)
        ->join('categories','categories.id','products.category_id')
        ->select(['products.id','products.name','products.description','products.price','categories.slug AS category_slug','categories.name AS category_name','products.slug'])->first();

        dd($product);
        $oldCart = Session::has('cart')?Session::get('cart'): null;

        if($qty==0){
            //ide még bekerül valami logika
        }

        $cart = new Cart($oldCart);
        $cart->add($product,$id,$qty);
        
        $request->session()->put('cart',$cart);

        if($request->ajax()){
            return response()->json($cart);

        }
        return redirect()->back();

    }*/
    public function postAddToCart(Request $request){
       /* $this->validate($request,[
        
            'qty'=>'numeric'
            ]);*/
        $id  = $request['id'];
        $qty = $request['qty'];
        
        $product = Product::with('category')
        ->where('products.id',$id)
        ->join('categories','categories.id','products.category_id')
        ->select(['products.id','products.name','products.description','products.price','categories.slug AS category_slug','categories.name AS category_name','products.slug'])->first();
        $oldCart = Session::has('cart')?Session::get('cart'): null;

        if($qty==0){
            //ide még bekerül valami logika
        }

        $cart = new Cart($oldCart);
        $cart->add($product,$id,$qty);
        
        $request->session()->put('cart',$cart);

        if($request->ajax()){
            return response()->json($cart);

        }
        return redirect()->back();

    }
    public function postUpdateCart(Request $request)
    {
        $id  = $request['id'];
        $qty = $request['qty'];
        
        $product = Product::find($id);
        $oldCart = Session::has('cart')?Session::get('cart'): null;

        if($qty==0){
            //ide még bekerül valami logika
        }

        $cart = new Cart($oldCart);
        $cart->update($product,$id,$qty);
        
        $request->session()->put('cart',$cart);

        if($request->ajax()){
            return response()->json($cart);

        }
        return redirect()->back();

    }
    public function getRemoveFromCart(Request $request,$id=null)
    {
        $oldCart = Session::has('cart')?Session::get('cart'): null;
        if($id==null){
            Session::remove('cart');
            return view('webshop.index');
        }
        
        $cart = new Cart($oldCart);
        $cart->remove($id);

        if(count($cart->items)==0){
            Session::remove('cart');
            return redirect()->back();
        }

        $request->session()->put('cart',$cart);

        return redirect()->back();
    }

    public function getImage($filename){      
        $file = Storage::disk('local')->get($filename);        
        return new Response($file,200);
    }

}
