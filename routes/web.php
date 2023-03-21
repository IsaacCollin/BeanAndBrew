<?php

use App\Http\Controllers\Community\RecipeController;
use App\Http\Controllers\Random\ApiController;
use App\Http\Controllers\Shop\DashboardController;
use App\Http\Controllers\Shop\MenuController;
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

Route::get('api', function () {
  return view('api');
});

Route::post('api', [ApiController::class, 'getWeather'])->name('api');

Route::prefix('recipes')->group(function () {
  Route::get('/create', [RecipeController::class, 'create'])->name('recipes.create');
  Route::get('/', [RecipeController::class, 'index'])->name('recipes.index');
  Route::get('/show', [RecipeController::class, 'show'])->name('recipes.show');
});

Route::prefix('shop')->group(function () {
  Route::get('/menu', [MenuController::class, 'index'])->name('shop.menu');
});

Route::middleware('auth')->group(function () {
});

require __DIR__ . '/auth.php';
