<?php
	
	/*
	|--------------------------------------------------------------------------
	| API Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register API routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| is assigned the "api" middleware group. Enjoy building your API!
	|
	*/
	Route::group(['prefix' => 'v1'], function () {
		//auth
		Route::post('register', 'Api\V1\Main\Auth\RegisterController@index');
		Route::post('login', 'Api\V1\Main\Auth\LoginController@index');
		Route::post('auth/otp/send', 'Api\V1\Main\Auth\OtpController@send');
		Route::post('auth/otp/verify', 'Api\V1\Main\Auth\OtpController@verify');
		
		
		
		Route::group(['middleware' => 'jwt.auth'], function () {
			//profile
			Route::get('user/profile', 'Api\V1\Main\User\UserController@profile');
			Route::put('user/profile', 'Api\V1\Main\User\UserController@update');
			
			//orders
			Route::get('user/orders', 'Api\V1\Main\Order\OrderController@list');
			Route::get('user/order', 'Api\V1\Main\Order\OrderController@index');
			
			//referral
			Route::get('user/referral', 'Api\V1\Main\User\UserController@referral');
			
			//page
			Route::get('page', 'Api\V1\Main\Page\PageController@index');
			
			//venture
			Route::get('venture', 'Api\V1\Main\Venture\VentureController@index');
			Route::get('ventures', 'Api\V1\Main\Venture\VentureController@list');
			
			//cart
			Route::post('cart/add', 'Api\V1\Main\Cart\CartController@add');
			Route::get('cart', 'Api\V1\Main\Cart\CartController@index');
			
			//logout
			Route::get('logout', 'Api\V1\Main\Auth\LogoutController@index');
		});
	});
	
	Route::group(['prefix' => 'panel/v1'], function () {
		
		Route::group(['middleware' => 'jwt.auth'], function () {
			//user
			Route::get('users', 'Api\V1\Panel\User\UserController@list');
			Route::get('user', 'Api\V1\Panel\User\UserController@index');
			Route::post('user', 'Api\V1\Panel\User\UserController@create');
			Route::put('user', 'Api\V1\Panel\User\UserController@update');
			
			//role
			Route::get('roles', 'Api\V1\Panel\Role\RoleController@list');
			Route::get('role', 'Api\V1\Panel\Role\RoleController@index');
			
			//venture
			Route::get('ventures', 'Api\V1\Panel\Venture\VentureController@list');
			Route::get('venture', 'Api\V1\Panel\Venture\VentureController@index');
			Route::delete('venture', 'Api\V1\Panel\Venture\VentureController@delete');
			Route::post('venture', 'Api\V1\Panel\Venture\VentureController@create');
			Route::put('venture', 'Api\V1\Panel\Venture\VentureController@update');
			
			//order
			Route::get('orders', 'Api\V1\Panel\Order\OrderController@list');
			Route::get('order', 'Api\V1\Panel\Order\OrderController@index');
			Route::delete('order', 'Api\V1\Panel\Order\OrderController@delete');
			Route::put('order', 'Api\V1\Panel\Order\OrderController@update');
			
			//voucher
			Route::get('voucher', 'Api\V1\Panel\Voucher\VoucherController@index');
			Route::get('vouchers', 'Api\V1\Panel\Voucher\VoucherController@list');
			Route::post('voucher', 'Api\V1\Panel\Voucher\VoucherController@create');
			Route::put('voucher', 'Api\V1\Panel\Voucher\VoucherController@update');
		});
	});





