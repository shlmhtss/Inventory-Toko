@extends('layouts.app')
@section('title', 'Data Kategori')

@section('content')
<div class="container mt-4">
    <div class="col-md-8 mx-auto">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">📁 Data Kategori</h5>
                <a href="{{ route('kategori.create') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-plus"></i> Tambah Kategori
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table id="kategoriTable" class="table table-bordered table-hover">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategori as $no => $k)
                            <tr>
                                <td class="text-center">{{ $no + 1 }}</td>
                                <td>{{ $k->nama }}</td>
                                <td class="text-center">
                                    <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Hapus kategori ini?')" class="btn btn-sm btn-danger">
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
    $('#kategoriTable').DataTable({
        responsive: true,
        pageLength: 5,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Cari kategori...",
            lengthMenu: "Tampilkan _MENU_ data",
            zeroRecords: "Data tidak ditemukan",
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
