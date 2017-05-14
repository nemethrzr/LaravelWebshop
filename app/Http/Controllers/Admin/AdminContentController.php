<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\ContentRequest;
use App\Http\Controllers\Controller;


use App\Content;

class AdminContentController extends Controller
{
    public function getShowAll()
    {
    	$contents = Content::paginate(10);
    	return view('admin.content.show',['contents'=>$contents]);
    }
    public function postCreate(ContentRequest $request)
    {
    	
    	$description = $request->description;

    	$data=[
    		'menu'=>$request['menu'],
    		'slug'=>$request['menu'],
    		'sort'=>4,
    		'description'=>$request->description
    	];
    	if($content = Content::find($request['id'])){
    		$content->menu = $data['menu'];
    		$content->slug = $data['slug'];
    		$content->sort = $data['sort'];
    		$content->description = $data['description'];
    		$content->save();
    	}else{
    		if(Content::updateOrCreate($data)){
    			return redirect()->back();
    		}	
    		return redirect()->back()->withErrors(['msg'=>'van van']);
    	}
    	
    	return redirect()->back();
    }
    public function getUpdate($content_id)
    {
    	$contents = Content::paginate(10);
    	$data  = Content::where('id',$content_id)->first();
    	return view('admin.content.show',['contents'=>$contents,'data'=>$data]);
    }

    public function getDelete($content_id)
    {
    	if(Content::destroy($content_id)){
    		return redirect()->back()->with(['message'=>'Sikeresen törölted az oldalt']);
    	}
    	return redirect()->back()->withErrors(['msg'=>'Hiba a törlés során']);
    }
}
