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

Route::get('/', 'TransactionController@viewTransaction');
Route::get('/create', 'TransactionController@createTransaction');
Route::post('/create', 'TransactionController@insertTransaction');
Route::post('/reset', 'TransactionController@resetTable');
Route::get('/detail', 'TransactionController@viewDetail');
