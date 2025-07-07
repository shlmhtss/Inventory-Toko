@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<div class="container d-flex justify-content-center mt-4" style="min-height: 70vh;">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-warning text-white">
                <h5 class="mb-0"><i class="fas fa-edit"></i> Edit Barang</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('barang.update', $barang->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label>Kode Barang</label>
                        <input type="text" name="kode_barang" class="form-control" value="{{ old('kode_barang', $barang->kode_barang) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang', $barang->nama_barang) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Kategori</label>
                        <select name="kategori_id" class="form-control" required>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}" {{ $barang->kategori_id == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Stok Masuk</label>
                        <input type="number" name="stok_masuk" class="form-control" value="{{ old('stok_masuk', $barang->stok_masuk) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Stok Keluar</label>
                        <input type="number" name="stok_keluar" class="form-control" value="{{ old('stok_keluar', $barang->stok_keluar) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Harga Satuan</label>
                        <input type="number" name="harga_satuan" class="form-control" value="{{ old('harga_satuan', $barang->harga_satuan) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Gambar Barang (Opsional)</label><br>
                        @if($barang->gambar)
                            <img src="{{ asset('storage/' . $barang->gambar) }}" alt="gambar barang" width="100" class="mb-2 d-block">
                        @endif
                        <input type="file" name="gambar" class="form-control-file">
                    </div>

                    <button type="submit" class="btn btn-warning w-100">
                        <i class="fas fa-save"></i> Update Barang
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
