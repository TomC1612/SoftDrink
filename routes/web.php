<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");
Route::post('/products', 'App\Http\Controllers\ProductController@load')->name("product.index");
Route::get('/', function () {
    return view('welcome');
});
Route::post('/search', 'App\Http\Controllers\ProductController@search')->name("product.search");
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");

Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase');
    Route::get('/myaccount/orders', 'App\Http\Controllers\MyAccountController@orders')->name('myaccount.orders');
    Route::get('/review/{id}/create', 'App\Http\Controllers\ReviewController@create')->name('review.create');
    Route::post('/review/{id}/save', 'App\Http\Controllers\ReviewController@save')->name('review.save');
    Route::get('review/{id}/edit', 'App\Http\Controllers\ReviewController@edit')->name('review.edit');
});

Route::middleware('admin')->group(function () {

    Route::get('/admin/product', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
    Route::get('/admin/product/create', 'App\Http\Controllers\Admin\AdminProductController@create')->name("admin.product.create");
    Route::post('/admin/product/save', 'App\Http\Controllers\Admin\AdminProductController@save')->name("admin.product.save");
    Route::delete('/admin/product/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
    Route::get('/admin/product/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
    Route::put('/admin/product/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");


    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");

    Route::get('/admin/user', 'App\Http\Controllers\Admin\AdminUserController@index')->name("admin.user.index");
    Route::get('/admin/user/create', 'App\Http\Controllers\Admin\AdminUserController@create')->name("admin.user.create");
    Route::post('/admin/user/save', 'App\Http\Controllers\Admin\AdminUserController@save')->name("admin.user.save");
    Route::delete('/admin/user/{id}/delete', 'App\Http\Controllers\Admin\AdminUserController@delete')->name("admin.user.delete");
    Route::get('/admin/user/{id}/edit', 'App\Http\Controllers\Admin\AdminUserController@edit')->name("admin.user.edit");
    Route::put('admin/user/{id}/update', 'App\Http\Controllers\Admin\AdminUserController@update')->name('admin.user.update');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
