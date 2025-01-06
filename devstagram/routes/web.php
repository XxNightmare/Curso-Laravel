<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MuroController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PrincipalController::class, 'index'])->name('principal');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/muro', [MuroController::class, 'index'])->middleware('auth')->name('dashboard');

