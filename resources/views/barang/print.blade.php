<!DOCTYPE html>
<html>
<head>
    <title>Print Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        @media print {
            .no-print { display: none; }
        }

        .gambar-barang {
            max-width: 150px;
            max-height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body onload="window.print()">

<div class="container mt-4">
    <h4 class="text-center mb-4">Detail Barang</h4>

    @if ($barang->gambar)
        <div class="text-center mb-3">
            <img src="{{ asset('storage/' . $barang->gambar) }}" class="gambar-barang" alt="Gambar Barang">
        </div>
    @endif

    <table class="table table-bordered">
        <tr><th>Kode Barang</th><td>{{ $barang->kode_barang }}</td></tr>
        <tr><th>Nama Barang</th><td>{{ $barang->nama_barang }}</td></tr>
        <tr><th>Kategori</th><td>{{ $barang->kategori->nama ?? '-' }}</td></tr>
        <tr><th>Stok Masuk</th><td>{{ $barang->stok_masuk }}</td></tr>
        <tr><th>Stok Keluar</th><td>{{ $barang->stok_keluar }}</td></tr>
        <tr><th>Stok Akhir</th><td>{{ $barang->stok_akhir }}</td></tr>
        <tr><th>Harga Satuan</th><td>Rp{{ number_format($barang->harga_satuan, 0, ',', '.') }}</td></tr>
        <tr><th>Total Nilai</th><td>Rp{{ number_format($barang->total_nilai, 0, ',', '.') }}</td></tr>
    </table>

    <div class="text-center no-print">
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">← Kembali</a>
    </div>
</div>

</body>
</html>
