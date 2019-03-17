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
	});
});

Route::group(['namespace'=>'frontend'], function(){
	Route::get('alert','FrontendController@getAlert')->name('alert-form');
	Route::get('/', 'HomeController@index')->name('home-user');
	//login
	Route::get('login','LoginController@index')->name('login')->middleware('CheckLogedIn');
	Route::post('login','LoginController@postLogin')->name('postLogin');
	Route::get('logout','LoginController@logout')->name('logout');
	
});