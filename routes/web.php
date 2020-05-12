<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Stock Routes
    // All item routes
    Route::resource('/item', 'Stock\ItemController')->middleware('auth');

    Route::get('/lorryinfo', 'Stock\LorryInfoController@index')->middleware('auth');

    // All stock routes
    Route::resource('/stock', 'Stock\StockController')->middleware('auth');

// Sales Routes
    // All customer routes
    Route::resource('/customer', 'Sale\CustomerController')->middleware('auth');

    // All sales routes 
    Route::get('/sale/receive', 'Sale\SaleController@receive')->name('sale.receive')->middleware('auth');
    Route::get('/sale/delete/{id}', 'Sale\SaleController@destroy')->name('sale.delete')->middleware('auth');
    Route::resource('/sale', 'Sale\SaleController')->middleware('auth');

    // All customer report routes 
    Route::resource('/repo', 'Sale\CustomerRepoController')->middleware('auth');

// Store Routes
    Route::resource('/store', 'Store\StoreController')->middleware('auth');

    Route::get('/store/create_more/{store_id}', 'Store\StoreController@create_more')->name('store.create_more')->middleware('auth');

    Route::get('/store/withdraw/{id}', 'Store\StoreController@withdraw')->name('store.withdraw')->middleware('auth');

    Route::post('/store/withdraw/update', 'Store\StoreController@withdraw_update')->name('store.withdraw.update')->middleware('auth');
