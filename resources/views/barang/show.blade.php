@extends('layouts.app')
@section('title', 'Detail Barang')

@section('content')
<div class="container mt-4">
    <div class="col-md-8 mx-auto">
        <div class="card shadow rounded-3">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-box-open me-2"></i>Detail Barang</h5>
                <a href="{{ route('barang.index') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                @if($barang->gambar)
                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/' . $barang->gambar) }}" class="img-thumbnail" width="200" alt="Gambar Barang">
                    </div>
                @endif

                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="30%">Kode Barang</th>
                        <td>{{ $barang->kode_barang }}</td>
                    </tr>
                    <tr>
                        <th>Nama Barang</th>
                        <td>{{ $barang->nama_barang }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>{{ $barang->kategori->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Stok Masuk</th>
                        <td>{{ $barang->stok_masuk }}</td>
                    </tr>
                    <tr>
                        <th>Stok Keluar</th>
                        <td>{{ $barang->stok_keluar }}</td>
                    </tr>
                    <tr>
                        <th>Stok Akhir</th>
                        <td>{{ $barang->stok_akhir }}</td>
                    </tr>
                    <tr>
                        <th>Harga Satuan</th>
                        <td>Rp{{ number_format($barang->harga_satuan, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Total Nilai</th>
                        <td>Rp{{ number_format($barang->total_nilai, 0, ',', '.') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
