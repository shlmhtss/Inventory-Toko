<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/profile', function () {
    return view('profile'); 
})->name('profile');


Route::get('/barang/{id}/print', [BarangController::class, 'print'])->name('barang.print');


Route::resource('barang', BarangController::class); // untuk Data Barang
Route::resource('kategori', KategoriController::class);   // untuk Kategori
