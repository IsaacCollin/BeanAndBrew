<?php

use App\Http\Controllers\DashboardController;
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



// Home page route
Route::get('/home', function () {
  return view('home');
});

Route::get('shop/dashboard', [DashboardController::class, 'index'])->name('shop.dashboard');

Route::middleware('auth')->group(function () {
});

require __DIR__ . '/auth.php';
