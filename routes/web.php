<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryController;


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

Route::get('/', function () {
    return view('homepage');
});

Route::get('/deliveries', [DeliveryController::class, 'index'])->name('deliveries.index');
Route::post('/deliveries', [DeliveryController::class, 'store'])->name('deliveries.store');

