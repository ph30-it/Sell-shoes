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
    return view('frontend.login');
});

Route::group(['namespace'=>'admin','middleware' => 'CheckAdmin'], function(){
	
	Route::group(['prefix'=> 'admin'], function(){
		Route::get('/', 'AdminController@index')->name('home-admin');
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