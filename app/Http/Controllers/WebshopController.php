<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class WebshopController extends Controller
{
    public function index($value='')    
    {    	
    	return view('webshop.index');
    }
}
