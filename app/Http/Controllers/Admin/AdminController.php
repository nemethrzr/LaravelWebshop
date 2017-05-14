<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getSignIn()
    {
    	return view('admin.auth.signin');
    }
    public function postSignIn(Request $request)
    {
    	return view('admin.auth.signin');
    }
}
