<?php

use App\Http\Controllers\ContectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
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

include 'admin.php';





Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('shop', [HomeController::class, 'shop'])->name('shop');







Route::get('testimonial', function () {
    return view('testimonial');
})->name('testimonial');

Route::get('contact', function () {
    return view('contact');
})->name('contact');



Route::get('product.details', function () {
    return view('product-details');
})->name('product.details');

Route::get('user/registeration', [UserController::class, 'create'])->name('user.registeration');
Route::post('user/store', [UserController::class, 'register'])->name('user.store');

Route::get('/search-products', [ProductController::class, 'searchProducts']);



Route::middleware('auth')->group(function () {
    Route::get('add/cart', [ProductController::class, 'addcart'])->name('add.cart');
    Route::get('cart', [ProductController::class, 'cart'])->name('cart');
    Route::get('update/cart', [ProductController::class, 'updatecart'])->name('update.cart');
    Route::get('remove/cart', [ProductController::class, 'removecart'])->name('remove.cart');
    Route::get('total/payout', [ProductController::class, 'totalpayout'])->name('total.payout');

    Route::get('chackout', [ProductController::class, 'chackout'])->name('chackout');
    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');

    Route::get('/my-orders', [OrderController::class, 'orders'])->name('orders');
    Route::get('/my-orders/{order}', [OrderController::class, 'ordershow'])->name('ordershow');

    Route::post('/contect/store', [ContectController::class, 'store'])->name('contact.store');

     Route::get('/contacts', [ContectController::class, 'contacts'])->name('contacts');
    Route::get('/contacts/{id}', [ContectController::class, 'contactsshow'])->name('contactsshow');
});

Route::get('user/login', [UserController::class, 'loginform'])->name('ulogin');
Route::post('user/login', [UserController::class, 'login'])->name('user.login');
Route::post('user/logout', [UserController::class, 'logout'])->name('user.logout');
