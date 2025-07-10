@extends('layouts.app')

@section('title', 'Laporan Stok Barang')

@section('content')

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">📦 Laporan Stok Barang</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok Masuk</th>
                        <th>Stok Keluar</th>
                        <th>Stok Akhir</th>
                        <th>Waktu Input</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barang as $no => $b)
                    <tr>
                        <td class="text-center">{{ $no + 1 }}</td>
                        <td>{{ $b->kode_barang }}</td>
                        <td>{{ $b->nama_barang }}</td>
                        <td>{{ $b->kategori->nama ?? '-' }}</td>
                        <td class="text-right">{{ $b->stok_masuk }}</td>
                        <td class="text-right">{{ $b->stok_keluar }}</td>
                        <td class="text-right">{{ $b->stok_akhir }}</td>
                        <td>{{ $b->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center mt-3">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection