<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('homepage');
});

Route::get('/deliveries', [DeliveryController::class, 'index'])->name('deliveries.index');
Route::post('/deliveries', [DeliveryController::class, 'store'])->name('deliveries.store');

//Add to Cart
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::get('/', [MenuController::class, 'index'])->name('menu.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
//Route::get('/order/transactions', [OrderController::class, 'transactions'])->name('order.transactions');
