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
Route::get('/', 'Controller@index');
Route::get('/test', 'Controller@test')->name('test');
Route::get('/amazon', 'AmazonController@show')->name('amazonLink');
Route::get('/amazon-force', 'AmazonController@showRedirect')->name('amazonForceLink');
Route::get('/amazon/callback', 'AmazonController@callback')->name('amazonCallback');
Route::get('/amazon/test', 'AmazonController@test')->name('amazonCallback');
