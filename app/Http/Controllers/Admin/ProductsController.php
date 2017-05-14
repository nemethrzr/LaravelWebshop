<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\CategoryRequest;

use App\Category;

class ProductsController extends Controller
{
   public function show()
   {
   		$categories = Category::orderBy('name','ASC')->paginate(10);

   		return view('admin.products.show',['categories'=>$categories]);
   }
   public function postUpdateCategory(CategoryRequest $request)
   {
   		$data = [
   			'name'=>$request['name'],
   			'slug'=>$request['name']
   			];

   		if($category = Category::find($request['id'])){
   			$category->name = $data['name'];
   			$category->slug = $data['slug'];
   			$category->save();
   			return redirect()->back()->with(['message'=>'Sikeresen módosítottad a kategóriát.']);
   		}


   		if(Category::create($data)){
   			return redirect()->back()->with(['message'=>'Sikeresen elmentetted a kategóriát.']);	
   		}
   		return redirect()->back()->withErrors(['msg'=>'Hiba történt!']);
   }
   public function getDeleteCategory($category_id)
   {
   		if(Category::destroy($category_id)){
   			return redirect()->back()->with(['message'=>'Sikeresen törölted a kategóriát']);
   		}

		return redirect()->back()->withErrors(['msg'=>'Hiba történt!']);
   }
   public function getUpdateCategory($category_id)
   {
   		$categories = Category::orderBy('name','ASC')->paginate(10);
   		$data = Category::where('id',$category_id)->first();
   		return view('admin.products.show',['categories'=>$categories,'data'=>$data]);
   }
}
