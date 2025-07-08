@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header bg-success text-white text-center">
                <h4>Daftar</h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Daftar</button>

                    <div class="mt-3 text-center">
                        Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection