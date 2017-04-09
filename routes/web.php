<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/signup','UserController@postSignUp')->name('postsignup');
Route::get('/signup','UserController@getSignUp')->name('getsignup');
Route::post('/signin','UserController@postSignIn')->name('postsignin');




Route::group(['middleware'=>'web'],function(){
	
});
