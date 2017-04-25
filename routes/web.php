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



Route::post('/signup','UserController@postSignUp')->name('postsignup');
Route::get('/signup','UserController@getSignUp')->name('getsignup');
Route::post('/signin','UserController@postSignIn')->name('postsignin');
Route::get('/signin','UserController@getSignIn')->name('getsignin');
Route::get('/signout','UserController@getSignOut')->name('getsignout');



// - webshop rész

Route::group(['prefix'=>'webshop'],function(){
	Route::get('/','WebshopController@index')->name('webshop');
	Route::get('/cart','WebshopController@getCart')->name('getcart');
	Route::get('/{category_slug}','WebshopController@getProducts')->name('getproducts');
	Route::get('/{category_slug}/{product_slug}/{product_id}','WebshopController@getProduct')->name('getproduct');
});

Route::get('/addtocart/{id}/{qty?}','WebshopController@getAddToCart')->name('getaddtocart');

Route::post('/postaddtocart','WebshopController@postAddToCart')->name('postaddtocart');
Route::post('/postupdatecart','WebshopController@postUpdateCart')->name('postupdatecart');

Route::get('/removefromcart/{id?}','WebshopController@getRemoveFromCart')->name('getremovefromcart');
//Route::get('/checkout');


//megrendelés rész

Route::group(['prefix'=>'order','middleware'=>'auth'],function(){
	Route::get('/checkout','OrderController@getCheckout')->name('getcheckout');
	Route::post('/checkout','OrderController@postCheckout')->name('postcheckout');
});

// - tartalmi rész

Route::group(['prefix'=>'content'],function(){
	Route::get('/{content_slug?}','ContentController@show')->name('getcontent');
});
Route::get('/','ContentController@index')->name('home');





Route::group(['middleware'=>'web'],function(){
	
});


Route::group(['middleware'=>'auth'],function(){
	Route::get('/account','UserController@getAccount')->name('getaccount');
	Route::post('/updateaccount','UserController@postAccount')->name('postaccount');

	Route::get('/getaddress','AddressController@getAddress')->name('getaddress');//

	Route::get('/deleteaddress/{address_id}','AddressController@getDeleteAddress')->name('getdeleteaddress');//

	Route::get('/updateaddress','AddressController@getUpdateAddress')->name('getupdateaddress');//

	Route::post('/postaddress','AddressController@postAddress')->name('postaddress');

});

Auth::routes();

Route::get('/home', 'HomeController@index');



Route::get('/image/{filename}','WebshopController@getImage')->name('getimage');
