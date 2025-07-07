<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->string('gambar')->nullable(); // kolom gambar, nullable karena opsional
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
            $table->unsignedInteger('stok_masuk')->default(0);
            $table->unsignedInteger('stok_keluar')->default(0);
            $table->unsignedInteger('stok_akhir')->default(0); // dihitung otomatis
            $table->unsignedInteger('harga_satuan')->default(0);
            $table->unsignedBigInteger('total_nilai')->default(0); // hasil stok_akhir * harga_satuan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
