<?php

use App\Http\Controllers\RecipeController;
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

Route::prefix('recipes')->group(function () {
  Route::get('/create', [RecipeController::class, 'create'])->name('recipes.create');
  Route::get('/', [RecipeController::class, 'index'])->name('recipes.index');
  Route::post('/', [RecipeController::class, 'index'])->name('recipes.index');
  //Route::get('/{category}', [RecipeController::class, 'index'])->name('recipes.index');
  Route::get('/{category}/{slug}', [RecipeController::class, 'show'])->name('recipes.show');
  Route::post('/', [RecipeController::class, 'store'])->name('recipe.store');
});

Route::prefix('shop')->group(function () {
  Route::get('/menu', [MenuController::class, 'index'])->name('shop.menu');
});

Route::middleware('auth')->group(function () {
});

require __DIR__ . '/auth.php';
