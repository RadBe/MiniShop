<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('/cart')->group(function() {
    Route::get('/', 'CartController@index')->name('cart');
    Route::post('/{product}/add', 'CartController@add')->name('cart.add')
        ->where('product', '[0-9]+');
    Route::post('/{product}/remove', 'CartController@remove')->name('cart.remove')
        ->where('product', '[0-9]+');
    Route::post('/clear', 'CartController@clear')->name('cart.clear');

    Route::post('/order', 'CartController@order')->name('cart.order');
});

Route::get('/admin2', function () {
    return view('admin.index');
})->name('admin');

Route::middleware('rank')->namespace('Admin')->group(function () {
    Route::resource('/admin/category', 'CategoryController', ['as' => 'admin']);
    Route::resource('/admin/product', 'ProductController', ['as' => 'admin']);
    Route::prefix('/order')->group(function () {
        Route::get('/', 'OrderController@index')->name('admin.order.index');
        Route::get('/{order}', 'OrderController@show')->name('admin.order.show');
        Route::post('/{order}/approve', 'OrderController@approve')->name('admin.order.approve');
        Route::post('/{order}/done', 'OrderController@done')->name('admin.order.done');
        Route::post('/{order}/remove', 'OrderController@remove')->name('admin.order.remove');
    });
    Route::resource('/admin/review', 'ReviewController', ['as' => 'admin']);
});
Auth::routes();
