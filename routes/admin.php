<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('admin/register', [RegisterController::class, 'create'])->name('admin.register');
Route::post('admin/store', [RegisterController::class, 'register'])->name('admin.store');




Route::get('admin/login', [LoginController::class, 'loginform'])->name('login');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');





// auth middalware
Route::middleware('auth')->group(function(){
Route::get('dashboard', function () {
    return view('admin-panel.dashboard');
})->name('dashboard');




Route::get('users/list', [UserController::class, 'index'])->name('users.list');
Route::prefix('products')->group(function(){
Route::get('create', [ProductController::class, 'create'])->name('products.create');
Route::get('list', [ProductController::class, 'index'])->name('products.list');

Route::post('store', [ProductController::class, 'store'])->name('products.store');

Route::get('{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('{id}', [ProductController::class, 'destroy'])->name('products.delete');

 Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::post('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.status');



});

});