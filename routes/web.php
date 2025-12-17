<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/', function () {
    return view('home');
});
Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/cart', [CartController::class, 'index']);

Route::post('/cart/add/{id}', [CartController::class, 'add'])
    ->name('cart.add');

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/cart/update/{id}', [CartController::class, 'update']);
Route::post('/cart/remove/{id}', [CartController::class, 'remove']);
Route::get('/cart/edit/{id}', [CartController::class, 'edit']);
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

// Route::post('/cart/add/{id}', [CartController::class, 'add'])
//     ->name('cart.add');

Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])
     ->name('cart.add');
Route::patch('/cart/update/{id}', [CartController::class, 'update'])
    ->name('cart.update');
Route::delete('/cart/delete/{id}', [CartController::class, 'destroy'])
    ->name('cart.destroy');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');


Route::post('/checkout/direct', [CheckoutController::class, 'directCheckout'])->name('checkout.direct');




