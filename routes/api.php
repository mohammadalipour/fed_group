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
		
		//referral
		Route::get('user/referral', 'Api\V1\Main\User\UserController@referral');
		
		//page
		Route::get('page', 'Api\V1\Main\Page\PageController@index');
		
		//venture
		Route::get('venture', 'Api\V1\Main\Venture\VentureController@index');
		Route::get('ventures', 'Api\V1\Main\Venture\VentureController@list');
		
		//logout
		Route::get('logout', 'Api\V1\Main\Auth\LogoutController@index');
	});
	
});






