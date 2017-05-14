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


Route::get('/contact','ContentController@getContact')->name('getcontact');
Route::post('/contact','ContentController@postContact')->name('postcontact');



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
	
	Route::post('/changepassword','UserController@postChangePassword')->name('postchangepassword');

	Route::group(['prefix'=>'user'],function(){
		Route::get('/order','OrderController@showAll')->name('getorderall');
		Route::get('/order/{order_id}','OrderController@show')->name('getorder');
	});

});


Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	Route::get('/signin','AdminController@getSignIn')->name('getadminsignin');
	Route::post('/signin','AdminController@postSignIn')->name('postadminsignin');
	Route::get('/signout','AdminController@getSignOut')->name('getadminsignout');




//menüpontok, tartalmi részek urljei
	Route::group(['prefix'=>'site'],function(){
		Route::get('/','AdminContentController@getShowAll')->name('getall_admincontent');
		Route::get('/{content_id}','AdminContentController@getContent')->name('getsite_admin');
		Route::get('/delete/{content_id}','AdminContentController@getDelete')->name('getdelete_admincontent');
		Route::get('/update/{content_id}','AdminContentController@getUpdate')->name('getupdate_admincontent');
		Route::post('/update/{content_id}','AdminContentController@postUpdate')->name('postupdate_admincontent');
		Route::get('/create','AdminContentController@getCreate')->name('getcreate_admincontent');
		Route::post('/create','AdminContentController@postCreate')->name('postcreate_admincontent');
	});
//termékek kezelése
	Route::group(['prefix'=>'products'],function(){
		Route::get('/','ProductsController@show')->name('getall_adminproduct');
	});
	Route::group(['prefix'=>'categories'],function(){
		Route::post('/create','ProductsController@postUpdateCategory')->name('postcreate_admincategory');
		Route::get('/update/{category_id}','ProductsController@getUpdateCategory')->name('getupdate_admincategory');
		Route::get('/delete/{category_id}','ProductsController@getDeleteCategory')->name('getdelete_admincategory');
	});
	//belépett admin felhasználóknak
	Route::group(['middleware'=>'auth'],function(){

	});

});

Auth::routes();

Route::get('/home', 'HomeController@index');



Route::get('/image/{filename}','WebshopController@getImage')->name('getimage');
