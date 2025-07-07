@extends('layouts.app')

@section('title', 'Data Barang')

@section('content')
<div class="container mt-4">
    <div class="col-md-12">
        <div class="card shadow rounded-3">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-box-open me-2"></i>Data Barang</h5>
                <a href="{{ route('barang.create') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-plus"></i> Tambah Barang
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="barangTable" class="table table-bordered table-hover table-striped">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barang as $no => $b)
                            <tr>
                                <td class="text-center">{{ $no + 1 }}</td>
                                <td class="text-center">
                                    @if($b->gambar)
                                        <img src="{{ asset('storage/' . $b->gambar) }}" width="50" height="50" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $b->kode_barang }}</td>
                                <td>{{ $b->nama_barang }}</td>
                                <td>{{ $b->kategori->nama ?? '-' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('barang.show', $b->id) }}" class="btn btn-sm btn-info" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('barang.print', $b->id) }}" target="_blank" class="btn btn-sm btn-secondary mb-1">
    <i class="fas fa-print"></i>
</a>

                                    <form action="{{ route('barang.destroy', $b->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
$(document).ready(function () {
    $('#barangTable').DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Cari barang...",
            lengthMenu: "Tampilkan _MENU_ data",
            zeroRecords: "Tidak ada data ditemukan",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            paginate: {
                first: "Awal",
                last: "Akhir",
                next: "→",
                previous: "←"
            }
        }
    });
});
</script>
@endpush
