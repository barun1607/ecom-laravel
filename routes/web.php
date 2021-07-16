<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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



Route::get('login', function () {
    return view('login');
});

Route::get('logout', function () {
    Session::forget('user');
    return redirect('');
});

Route::get('register', function () {
    return view('register');
});

Route::post('register-complete', [UserController::class, 'register']);

Route::view('register', 'register');

Route::post('login', [UserController::class, 'login']);

Route::get('', [ProductController::class, 'index']);
Route::get('detail/{id}', [ProductController::class, 'detail']);
Route::post('add-to-cart', [ProductController::class, 'addToCart']);
Route::get('cart-list', [ProductController::class, 'cartList']);
Route::get('remove-cart/{id}', [ProductController::class, 'remove']);
Route::get('checkout', [ProductController::class, 'checkout']);
Route::post('order', [ProductController::class, 'order']);
Route::get('order-list', [ProductController::class, 'orderList']);
Route::get('cancel-order/{id}', [ProductController::class, 'cancel']);
