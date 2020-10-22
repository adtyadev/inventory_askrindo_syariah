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

Route::get('/', 'KategoriController@index');
Route::resource('category', KategoriController::class);
Route::get('/category/hapus/{id}', 'KategoriController@destroy');

Route::resource('item', BarangController::class);
Route::get('/item/hapus/{id}', 'BarangController@destroy');

Route::resource('transaction', TransaksiController::class);
Route::get('/transaction/detail/{code_transaction}', 'TransaksiController@detail');
Route::get('/transaction/report/items','TransaksiController@report_stock_item');
Route::get('/transaction/report/sales','TransaksiController@report_sales_item');