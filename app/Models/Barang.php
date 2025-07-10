<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'gambar',
        'kategori_id',
        'stok_masuk',
        'stok_keluar',
        'stok_akhir',
        'harga_satuan',
        'total_nilai',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // Akses gambar secara otomatis jika ingin ditampilkan dengan URL lengkap
    public function getGambarUrlAttribute()
    {
        return $this->gambar
            ? asset('storage/' . $this->gambar)
            : asset('images/default.png'); // fallback default jika tidak ada gambar
    }
    public $timestamps = true;
}
