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
			Route::get('{id}/show-new-password', 'UserController@showNewPassword')->name('show-new-password');
			Route::put('{id}/new-password', 'UserController@newPassword')->name('new-password-admin');
			Route::delete('{id}/delete', 'UserController@destroy')->name('delete-user');
			//search user
			Route::get('search-user','UserController@searchUser')->name('search-user-admin');
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
			Route::get('/action','ProductController@action')->name('search-product-admin');
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
			//search product
			Route::get('search-product','ProductController@searchProduct')->name('search-product-admin');
		});
		//Order management
		Route::group(['prefix' => 'order'], function(){
			Route::get('/', 'OrderController@index')->name('order-admin');
			Route::get('{id}/show-detail','OrderController@show')->name('detail-order');
			Route::post('{id}/show-detail','OrderController@update')->name('status-detail-order');
			Route::delete('{id}/delete', 'OrderController@destroy')->name('delete-order');
			//order filter by status
			Route::get('{id}/order-filter-by-status','OrderController@orderFilterStatus')->name('order-filter-status');
			//search order
			Route::get('search-order','OrderController@orderSearch')->name('order-search-admin');
		});
		//Comment management
		Route::group(['prefix' => 'comment'], function(){
			Route::get('/','CommentController@index')->name('comment-admin');
			Route::get('{id}/edit','CommentController@edit')->name('show-edit-comment');
			Route::put('{id}/edit','CommentController@update')->name('edit-comment');
			Route::delete('{id}/delete', 'CommentController@destroy')->name('delete-comment');
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
	//proflie user
	Route::group(['prefix' => 'tai-khoan-cua-toi','middleware' => 'CheckProfile'], function(){
			Route::get('/','ProfileUserController@index')->name('profile-user');
			//change email
				Route::get('{id}/xac-thuc-mat-khau/email','ProfileUserController@emailConfirmPassword')->name('email-confirm-password-user');
				//confirm password
				Route::post('{id}/xac-thuc-mat-khau/email','ProfileUserController@postEmailConfirmPassword')->name('post-email-confirm-password-user');
				//view update email
				Route::get('{id}/update-email','ProfileUserController@viewUpdateEmail')->name('view-update-email-user');
				//update email
				Route::put('{id}/update-email','ProfileUserController@updateEmail')->name('update-email-user');
			//change phone
				Route::get('{id}/xac-thuc-mat-khau/so-dien-thoai','ProfileUserController@phoneConfirmPassword')->name('phone-confirm-password-user');
				//confirm password
				Route::post('{id}/xac-thuc-mat-khau/phone','ProfileUserController@postPhoneConfirmPassword')->name('post-phone-confirm-password-user');
				//view update phone
				Route::get('{id}/update-phone','ProfileUserController@viewUpdatePhone')->name('view-update-phone-user');
				//update phone
				Route::put('{id}/update-phone','ProfileUserController@updatePhone')->name('update-phone-user');
			//change password
				//view update password
				Route::get('{id}/update-password','ProfileUserController@viewUpdatePassword')->name('view-update-password-user');
				//update password
				Route::put('{id}/update-password','ProfileUserController@updatePassword')->name('update-password-user');
			//update profile
				Route::put('{id}/cat-nhat-ho-so','ProfileUserController@update')->name('update-profile-user');
		});

	Route::get('san-pham','ProductController@index')->name('list-all-product');
	//list product by category
	Route::get('san-pham/{id}/{category}','ProductController@productByCategory')->name('list-product-by-category');
	//list product by brand
	Route::get('san-pham/{id}/hang/{brand}','ProductController@productByBrand')->name('list-product-by-brand');
	//filter product
	Route::get('san-pham/loc-san-pham','ProductController@filterProduct')->name('filter-product-user');

	Route::get('gioi-thieu','FrontendController@indexGioiThieu')->name('info-shop');
	Route::get('lien-he','ContactController@index')->name('contact-user');
	// dang ki nguoi dung
	Route::get('dang-ki','RegisterController@index')->name('register-user');
	Route::post('dang-ki','RegisterController@store')->name('register-user');
	//contact(lien-he)
	Route::get('lien-he','ContactController@index')->name('contact-user');
	Route::post('lien-he','ContactController@store')->name('mail-contact-user');
	Route::get('lien-he-done','ContactController@contactDone')->name('contact-done-user');
	//Tìm kiếm(search)
	Route::get('tim-kiem','SearchController@index')->name('search-user');
	//live search ajax
	Route::get('liveSearch','SearchController@liveSearch')->name('live-search-user');
	//chi tiet san pham
	Route::get('detail/{id}/{slug}.html', 'DetailProductController@index')->name('show-detail-product');
	//comment
	Route::post('detail/{id}/comment-user', 'CommentController@storeUser')->name('user-comment-product');
	Route::delete('detail/{id}/delete', 'CommentController@destroy')->name('delete-comment-user');
	//shopping cart
	Route::group(['prefix' => 'gio-hang'], function(){
			Route::get('/', 'ShoppingCartController@index')->name('shoppingCart-user');
			//Route::post('{id}/add', 'ShoppingCartController@store2')->name('add-cart-user');
			Route::get('add', 'ShoppingCartController@store')->name('add-cart-user');
			Route::get('{id}/delete','ShoppingCartController@destroy')->name('delete-cart-user');
			//delete by ajax
			Route::get('delete','ShoppingCartController@destroyAjax')->name('deleteAjax-cart-user');
			Route::get('{update-quantity','ShoppingCartController@update')->name('update-quantity-cart');
		});
	//buy now
	Route::get('buy-now','DetailProductController@buyNow')->name('buy-now-user');
	//checkout
	Route::get('checkout','CheckoutController@index')->name('show-checkout-user');
	Route::post('checkout','CheckoutController@store')->name('checkout-user');
	

});