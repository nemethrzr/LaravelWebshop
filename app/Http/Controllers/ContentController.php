<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Content;

class ContentController extends Controller
{
	public function index()
	{
		$content = new Content();
		$data = $content->where('sort',1)->first();
		//$data = $content->where('id',1)->first();
		//var_dump($data);
		return view('content.show',['content'=>$data]);
	}
    public function show($content_slug)
    {
    	$content = new Content();
    	
    	$data = $content->where('slug',$content_slug)->first();	    	   	

    	return view('content.show',['content'=>$data]);
    }
}
