@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
<div class="container d-flex justify-content-center align-items-start mt-4" style="min-height: 70vh;">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-box"></i> Tambah Barang</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label>Kode Barang</label>
                        <input type="text" name="kode_barang" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Gambar Barang</label>
                        <input type="file" name="gambar" class="form-control-file">
                    </div>

                    <div class="form-group mb-3">
                        <label>Kategori</label>
                        <select name="kategori_id" class="form-control" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Stok Masuk</label>
                        <input type="number" name="stok_masuk" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Stok Keluar</label>
                        <input type="number" name="stok_keluar" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Harga Satuan (Rp)</label>
                        <input type="number" name="harga_satuan" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        <i class="fas fa-save"></i> Simpan Data
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
