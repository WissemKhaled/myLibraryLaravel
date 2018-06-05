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

// Custom routes
Route::get('/book', 'BookController@display');
Route::get('/book/new', 'BookController@insert');
Route::post('/book/new', 'BookController@insertAction');
Route::post('/book/delete', 'BookController@deleteAction');

Route::get('/book/update', 'BookController@update');
Route::post('/book/update', 'BookController@updateAction');

// Base route, require a view named like the URI
Route::get('/{all?}', 'NavigationController@showPage');