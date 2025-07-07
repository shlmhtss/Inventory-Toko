@extends('layouts.app')
@section('title', 'Edit Kategori')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-warning text-white">
                Edit Kategori
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="form-group mb-3">
                        <label>Nama Kategori</label>
                        <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}" required>
                    </div>
                    <button type="submit" class="btn btn-warning w-100">
                        <i class="fas fa-save"></i> Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
