<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\RegisteredUserController;


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

// // store and redirect
// Route::post('/register', [RegisteredUserController::class, 'store'])->followedBy(function () {
//     return view('auth.success');
// });

// Add these routes in your web.php to avoid the error
Route::view('/terms', 'terms');  // Define a route for terms of service
Route::view('/policy', 'policy');  // Define a route for privacy policy

// // redirect succes page after register
// Route::get('/registration-successful', function () {
//     return Inertia::render('Success');
//   })->middleware('auth:sanctum')->name('registration.successful');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
