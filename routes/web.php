<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\menuController;


use App\Http\Controllers\RegisterController;
use App\Http\Controllers\transactionController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\OrderController;

// use App\Http\Controllers\transactionController;
use Inertia\Inertia;
use App\Http\Controllers\Auth\RegisteredUserController;


/*-------------------------------------------------------------------------
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// route to my login page

Route::get('/login', function () {
    return view('auth.login'); // Path to your custom login Blade view
})->name('login');


Route::get('/register', function () {
    return view('auth.register');
})->name('register');



// Add these routes in your web.php to avoid the error

Route::view('/terms', 'terms'); // Define a route for terms of service
Route::view('/policy', 'policy'); // Define a route for privacy policy

// // route to registration
// Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
// Route::post('/register', [RegisteredUserController::class, 'store']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/home', function () {
    return view('homepage');
});

Route::get('profile', function () {
    return view('profile'); // Page with Admin and Customer buttons
})->name('profile');


// Admin Dashboard
Route::get('/admin', function () {
    return view('admin.adminPage');
})->name('admin');
// // Admin Login Route
Route::get('/adminlogin', function () {
    return view('auth.adminlogin'); // Ensure this matches the location of your adminlogin.blade.php
})->name('adminlogin');
// // Login routes for admin
// Admin Login Routes
Route::get('/adminlogin', [LoginController::class, 'showLoginForm'])->name('adminlogin.form'); // Show admin login form
Route::post('/adminlogin', [LoginController::class, 'login'])->name('adminlogin.post');       // Handle admin login form submission

Route::get('/menu', [menuController::class, 'index'])->name('menu.index');
// Route::post('/menu/add-to-cart', [menuController::class, 'addToCart']);

// Add Menu Page
Route::get('/menu/add', [menuController::class, 'create'])->name('menu.create');
Route::post('/menu/store', [menuController::class, 'store'])->name('menu.store');
// Update Menu Page
// Route::get('/menu/update', [menuController::class, 'edit'])->name('menu.edit'); // Show the list of menus to select from
// Route::get('/menu/update/{id}', [menuController::class, 'showEditForm'])->name('menu.showEditForm'); // Show the form to update a specific menu by ID
// Route::put('/menu/update/{id}', [menuController::class, 'update'])->name('menu.update');// Update the selected menu
// Show the list of menus to select from
Route::get('/menu/update', [MenuController::class, 'edit'])->name('menu.edit');

// Show the edit form for a specific menu
Route::get('/menu/update/{id}', [MenuController::class, 'showEditForm'])->name('menu.showEditForm');

// Handle the update for a specific menu
Route::put('/menu/update/{id}', [MenuController::class, 'update'])->name('menu.update');

// Delete Menu Page
Route::get('/menu/delete', [menuController::class, 'deletePage'])->name('menu.delete');
Route::delete('/menu/{id}', [menuController::class, 'destroy'])->name('menu.destroy');


Route::get('/deliveries', [DeliveryController::class, 'index'])->name('deliveries.index');
Route::post('/deliveries', [DeliveryController::class, 'store'])->name('deliveries.store');

// Menu Routes
Route::get('/', [MenuController::class, 'index'])->name('menu.index');

// Cart Routes
//Add to Cart
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');

// Prevent GET request to /cart/add
Route::get('/cart/add', function () {
    return redirect()->route('menu.index'); // Redirect to menu if accessed via GET
});

//cartSummary
Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
Route::get('/cart/summary', [OrderController::class, 'showCartSummary'])->name('cart.summary'); // Cart summary
Route::post('/order/item/delete', [OrderController::class, 'deleteItem'])->name('order.item.delete');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/success', function () {
    return view('auth.success');
})->name('success');


//baru
Route::resource('transactions', transactionController::class);

Route::get('/transaction', [transactionController::class, 'index'])->name('transaction.index');

Route::post('/transaction', [transactionController::class, 'store'])->name('transaction.store');
Route::get('/transaction/{order_id}/edit', [transactionController::class, 'edit'])->name('transaction.edit');
Route::put('/transaction/{order_id}', [transactionController::class, 'update'])->name('transaction.update');
Route::delete('/transaction/{order_id}', [transactionController::class, 'destroy'])->name('transaction.destroy');

Route::get('/add-transaction', function () {
    return view('add-transaction');
});
