<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\menuController;


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

// Admin Dashboard
Route::get('/admin', function () {
    return view('admin.adminPage');
})->name('admin');

Route::get('/menu', [menuController::class, 'index'])->name('menu.index');
Route::post('/menu/add-to-cart', [menuController::class, 'addToCart']);

// Route::get('/admin/add-menu', [menuController::class, 'create'])->name('menu.add');
// Route::post('/admin/add-menu', [menuController::class, 'store']);

// Route::get('/admin/update-menu', [menuController::class, 'edit'])->name('menu.update');
// Route::post('/admin/update-menu', [menuController::class, 'update']);

// Route::get('/admin/delete-menu', [menuController::class, 'delete'])->name('menu.delete');
// Route::post('/admin/delete-menu', [menuController::class, 'destroy']);

// Add Menu Page
Route::get('/menu/add', [menuController::class, 'create'])->name('menu.add');
// Update Menu Page
Route::get('/menu/update', [menuController::class, 'edit'])->name('menu.update');
// Delete Menu Page
Route::get('/menu/delete', [menuController::class, 'deletePage'])->name('menu.delete');

Route::get('/deliveries', [DeliveryController::class, 'index'])->name('deliveries.index');
Route::post('/deliveries', [DeliveryController::class, 'store'])->name('deliveries.store');

