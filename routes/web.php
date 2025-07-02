<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('inventory', InventoryController::class); // untuk Data Barang
Route::resource('kategori', KategoriController::class);   // untuk Kategori
