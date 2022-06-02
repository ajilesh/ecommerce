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
// use Illuminate\Support\Facades\Route;

Route::prefix('product')->group(function() {
    Route::middleware(['auth:admin','preventBackHistory'])->group(function(){
        Route::get('/', 'ProductController@index');
        Route::get('/product','ProductController@addproduct')->name('product');
        Route::post('/productinsert','ProductController@productinsert')->name('productinsert');
    });
    
});
