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
Route::get('login',function(){
	return view('login');
});
Route::post('login','LoginController@postLogin');
Route::get('',function(){
	return view('home');
});

Route::get('homePage',['as'=>'homePage','uses'=>'PageController@getHome']);
Route::get('product/{id}',['as'=>'product','uses'=>'PageController@getProduct']);
Route::get('product_type/{id}',['as'=>'product_type','uses'=>'PageController@getProductType']);
Route::get('shop',['as'=>'shop','uses'=>'PageController@getShop']);
Route::get('about',['as'=>'about','uses'=>'PageController@getAbout']);
Route::get('contact',['as'=>'contact','uses'=>'PageController@getContact']);

Route::get('cart',['as'=>'cart','uses'=>'PageController@getCart']);
Route::get('addCart/{id}',['as'=>'addCart','uses'=>'PageController@addCart']);
Route::get('removeCart/{id}',['as'=>'removeCart','uses'=>'PageController@removeCart']);
Route::get('destroyCart',['as'=>'destroyCart','uses'=>'PageController@destroyCart']);
Route::get('minusQtyCart/{id}',['as'=>'minusQtyCart','uses'=>'PageController@minusQtyCart']);
Route::get('addQtyCart/{id}',['as'=>'addQtyCart','uses'=>'PageController@addQtyCart']);

Route::get('order',['as'=>'order','uses'=>'PageController@getOrder']);
Route::post('order',['as'=>'order','uses'=>'PageController@checkout']);

Route::get('checkout',['as'=>'checkout','uses'=>'PageController@getCheckout']);

Route::get('search',['as'=>'search','uses'=>'PageController@search']);



Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'category'],function(){

		Route::get('list','CategoryController@getList');

		Route::get('add','CategoryController@getAdd');
		Route::post('add','CategoryController@postAdd');

		Route::get('edit/{id}','CategoryController@getEdit');
		Route::post('edit/{id}','CategoryController@postEdit');

		Route::get('delete/{id}','CategoryController@getDelete');


	});
	Route::group(['prefix'=>'manufacture'],function(){

		
		Route::get('list','ManufactureController@getList');

		Route::get('add','ManufactureController@getAdd');
		Route::post('add','ManufactureController@postAdd');

		Route::get('edit/{id}','ManufactureController@getEdit');
		Route::post('edit/{id}','ManufactureController@postEdit');

		Route::get('delete/{id}','ManufactureController@getDelete');

	});
	Route::group(['prefix'=>'product'],function(){

		Route::get('list','ProductController@getList');

		Route::get('add','ProductController@getAdd');
		Route::post('add','ProductController@postAdd');

		Route::get('edit/{id}','ProductController@getEdit');
		Route::post('edit/{id}','ProductController@postEdit');
		Route::get('delete/{id}','ProductController@getDelete');

	});
	Route::group(['prefix'=>'slide'],function(){

		Route::get('list','SlideController@getList');

		Route::get('add','SlideController@getAdd');
		Route::post('add','SlideController@postAdd');

		Route::get('edit/{id}','SlideController@getEdit');
		
		Route::post('edit/{id}','slideController@postEdit');
		Route::get('delete/{id}','SlideController@getDelete');


	});
	Route::group(['prefix'=>'user'],function(){

		Route::get('list','UserController@getList');

 		Route::get('add','UserController@getAdd');
        Route::post('add','UserController@postAdd');

		Route::get('edit/{id}','UserController@getEdit');
		
		Route::post('edit/{id}','UserController@postEdit');
		Route::get('delete/{id}','UserController@getDelete');

	});

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
