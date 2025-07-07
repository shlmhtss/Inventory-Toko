@extends('layouts.app')
@section('title', 'Tambah Kategori')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                Tambah Kategori
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Nama Kategori</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
