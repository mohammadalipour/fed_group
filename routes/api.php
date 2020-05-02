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
    Route::get('logout', 'Api\V1\Main\Auth\LogoutController@index');
    Route::post('auth/otp/send', 'Api\V1\Main\Auth\OtpController@send');
    Route::post('auth/otp/verify', 'Api\V1\Main\Auth\OtpController@verify');
    
    //venture
	Route::get('venture', 'Api\V1\Main\Venture\VentureController@index');
	Route::get('ventures', 'Api\V1\Main\Venture\VentureController@list');
	
	//page
	Route::get('page', 'Api\V1\Main\Page\PageController@index');
	
});






