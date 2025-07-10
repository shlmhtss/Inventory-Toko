<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Inventory Toko</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(to right, #007bff, #00c6ff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .welcome-box {
            background: rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
        }

        .welcome-icon {
            font-size: 80px;
            margin-bottom: 20px;
        }

        .btn-custom {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="welcome-box shadow-lg">
        <!-- Ikon toko -->
        <div class="welcome-icon">
            <i class="fas fa-store"></i> <!-- Ikon toko muncul sekarang -->
        </div>

        <h1 class="display-4 mb-3">Selamat Datang</h1>
        <p class="lead">di Sistem Inventory Toko</p>

        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-light btn-lg btn-custom mr-2">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
            <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg btn-custom">
                <i class="fas fa-user-plus"></i> Register
            </a>
        </div>
    </div>
</div>

</body>
</html>