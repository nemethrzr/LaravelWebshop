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
})->name('home');

Route::post('/signup','UserController@postSignUp')->name('postsignup');
Route::get('/signup','UserController@getSignUp')->name('getsignup');
Route::post('/signin','UserController@postSignIn')->name('postsignin');
Route::get('/signin','UserController@getSignIn')->name('getsignin');
Route::get('/signout','UserController@getSignOut')->name('getsignout');


Route::get('/webshop','WebshopController@index')->name('webshop');
Route::get('/webshop/{category_slug}/{page}','WebshopController@index')->name('getproducts');
Route::get('/webshop/{category_slug}/{product_slug}/{product_id}','WebshopController@getProduct')->name('getproduct');

Route::group(['middleware'=>'web'],function(){
	
});

Auth::routes();

Route::get('/home', 'HomeController@index');
