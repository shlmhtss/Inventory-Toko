@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0">✏ Edit Profil</h5>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <div class="form-group mb-3">
                    <label>Password Baru (Opsional)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label>Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection