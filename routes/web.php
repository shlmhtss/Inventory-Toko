<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;

// 1. Tampilan Awal = welcome.blade.php
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// 2. Login & Register (tidak perlu login untuk akses ini)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 3. Route yang hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    Route::resource('barang', BarangController::class);
    Route::get('/barang/{id}/print', [BarangController::class, 'print'])->name('barang.print');

    Route::resource('kategori', KategoriController::class);

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});