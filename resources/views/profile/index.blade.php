@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">👤 Profil Pengguna</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>

            <a href="{{ route('profile.edit') }}" class="btn btn-light btn-sm">
                <i class="fas fa-edit"></i> Edit
            </a>

            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-danger btn-sm">
        <i class="fas fa-sign-out-alt"></i> Logout
    </button>
</form>
        </div>
    </div>
</div>
@endsection