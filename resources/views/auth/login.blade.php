@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h4>Login</h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required autofocus>
                    </div>

                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>

                    <div class="mt-3 text-center">
                        Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection