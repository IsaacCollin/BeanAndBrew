<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

  Route::get('auth/register', [RegisteredUserController::class, 'create'])
    ->name('auth.register');

  Route::post('auth/register', [RegisteredUserController::class, 'store']);

  Route::get('auth/login', [AuthenticatedSessionController::class, 'create'])
    ->name('auth.login');

  Route::post('auth/login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {

  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
  ->name('logout');
  
});