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
    Route::post('register', 'Api\V1\Auth\RegisterController@index');
    Route::post('login', 'Api\V1\Auth\LoginController@index');
    Route::get('logout', 'Api\V1\Auth\LogoutController@index');

//product
    Route::post('product/import', 'Api\V1\ProductController@import')->middleware('jwt.auth');
    Route::get('product/{id}', 'Api\V1\ProductController@index');
    Route::get('products', 'Api\V1\ProductController@list');

//categories
    Route::post('category/import', 'Api\V1\CategoryController@import')->middleware('jwt.auth');
    Route::get('category/{id}', 'Api\V1\CategoryController@index');
    Route::get('categories', 'Api\V1\CategoryController@list');
    Route::get('category/{id}/products', 'Api\V1\CategoryController@products');

});






