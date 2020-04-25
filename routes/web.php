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


Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();
Route::get('panel/home', 'panel\HomeController@index')->name('home')->middleware('auth');
Route::post('panel/product/import', 'panel\ProductController@import')->name('import-product')->middleware('api');
Route::post('panel/category/import', 'panel\ProductController@import')->name('import-category')->middleware('api');
