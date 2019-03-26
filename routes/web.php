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
Route::get('test', function () {
    return view('frontend.checkout');
});

Route::group(['namespace'=>'admin','middleware' => 'CheckAdmin'], function(){
	
	Route::group(['prefix'=> 'admin'], function(){
		Route::get('/', 'AdminController@index')->name('home-admin');
		//user management
		Route::group(['prefix'=>'user'], function(){
			Route::get('/', 'UserController@index')->name('user-admin');
			Route::get('add', 'UserController@create')->name('show-add-user');
			Route::post('add', 'UserController@store')->name('add-user');
			Route::get('{id}/edit', 'UserController@edit')->name('show-edit-user');
			Route::put('{id}/edit', 'UserController@update')->name('edit-user');
			Route::delete('{id}/delete', 'UserController@destroy')->name('delete-user');
		});
		//Category management
		Route::group(['prefix' => 'category'], function(){
			Route::get('/', 'CategoryController@index')->name('category-admin');
			Route::post('add', 'CategoryController@store')->name('add-category');
			Route::get('{id}/edit', 'CategoryController@edit')->name('show-edit-category');
			Route::put('{id}/edit', 'CategoryController@update')->name('edit-category');
			Route::delete('{id}/delete', 'CategoryController@destroy')->name('delete-category');
		});
		//Product management
		Route::group(['prefix'=>'product'], function(){
			Route::get('/', 'ProductController@index')->name('product-admin');
			Route::get('add', 'ProductController@create')->name('show-add-product');
			Route::post('add', 'ProductController@store')->name('add-product');
			//view list product size
			Route::get('{id}/view-product-size', 'ProductSizeController@index')->name('view-product-size');
			//update quantity product size
			Route::get('view-product-size/update', 'ProductSizeController@updateQuantity')->name('update-product-size');
			//delete size
			Route::delete('{id}/view-product-size/delete','ProductSizeController@destroy')->name('delete-product-size');
			//add size
			Route::post('{id}/view-product-size', 'ProductSizeController@store')->name('add-size-product');
			//view list images product
			Route::get('{id}/view-product-image','ImageProductController@index')->name('view-product-image');
			//view update type image
			Route::get('product-image/{id}/update','ImageProductController@edit')->name('view-edit-type-product-image');
			//update type image
			Route::put('product-image/{id}/update','ImageProductController@update')->name('edit-type-product-image');

			Route::get('{id}/edit', 'ProductController@edit')->name('show-edit-product');
			Route::put('{id}/edit', 'ProductController@update')->name('edit-product');
			Route::delete('{id}/delete', 'ProductController@destroy')->name('delete-product');
		});
	});
});

Route::group(['namespace'=>'frontend'], function(){
	Route::get('alert','FrontendController@getAlert')->name('alert-form');
	Route::get('/', 'HomeController@index')->name('home-user');
	//login
	Route::get('login','LoginController@index')->name('login')->middleware('CheckLogedIn');
	Route::post('login','LoginController@postLogin')->name('postLogin');
	Route::get('logout','LoginController@logout')->name('logout');

	Route::get('san-pham','ProductController@index')->name('list-all-product');
	Route::get('gioi-thieu','FrontendController@indexGioiThieu')->name('info-shop');
	Route::get('lien-he','ContactController@index')->name('contact-user');
	//chi tiet san pham
	Route::get('detail/{id}/{slug}.html', 'DetailProductController@index')->name('show-detail-product');
	
});