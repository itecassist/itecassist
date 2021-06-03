<?php

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

Route::get('/', [App\Http\Controllers\SiteController::class, 'index']);
// Route::get('/about', [App\Http\Controllers\SiteController::class, 'about']);
// Route::get('/products', [App\Http\Controllers\SiteController::class, 'products']);
// Route::get('/portfolio', [App\Http\Controllers\SiteController::class, 'portfolio']);
Route::get('/fqa', [App\Http\Controllers\SiteController::class, 'fqa']);
Route::get('/contact', [App\Http\Controllers\SiteController::class, 'contact']);
Route::post('/contact', [App\Http\Controllers\SiteController::class, 'contactPost']);
Route::get('/services', [App\Http\Controllers\SiteController::class, 'services']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['web','auth'], 'prefix'=>'admin'], function () {
    Route::resource('customers', \App\Http\Controllers\Admin\CustomersController::class);
    Route::prefix('customer')->group(function () {
        Route::get('profile', [\App\Http\Controllers\Admin\CustomersController::class, 'profile']);
        Route::get('emails', [\App\Http\Controllers\Admin\CustomersController::class, 'emails']);
    });
    Route::resource('products', \App\Http\Controllers\Admin\ProductsController::class);
    Route::get('customers/set/{id}', [\App\Http\Controllers\Admin\CustomersController::class, 'set']);
    Route::prefix('profile')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\ProfileController::class, 'index']);
    });
});
