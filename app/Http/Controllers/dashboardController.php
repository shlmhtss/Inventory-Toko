<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;

class dashboardController extends Controller
{
    public function index()
{
    $barang = Barang::all();

    return view('dashboard', [
        'jumlahBarang' => $barang->count(),
        'jumlahKategori' => Kategori::count(),
        'totalStokMasuk' => $barang->sum('stok_masuk'),
        'totalStokKeluar' => $barang->sum('stok_keluar'),
        'namaBarang' => $barang->pluck('nama_barang'),
        'stokMasuk' => $barang->pluck('stok_masuk'),
        'stokKeluar' => $barang->pluck('stok_keluar'),
        'totalNilai' => $barang->pluck('total_nilai'),
    ]);
}


}