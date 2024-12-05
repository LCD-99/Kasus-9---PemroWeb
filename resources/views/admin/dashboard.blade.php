<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Optional Bootstrap for better styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            transition: all 0.3s ease;
        }

        /* Sidebar Style */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
            color: white;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            transition: width 0.3s ease;
        }

        .sidebar h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
        }

        .sidebar a {
            padding: 12px 20px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            margin: 10px 0;
            border-radius: 4px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .sidebar a:hover {
            background-color: #575757;
            transform: translateX(5px);
        }

        /* Logout Button */
        .logout-btn {
            background-color: #d9534f;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: auto;
            margin-bottom: 20px;
        }

        .logout-btn:hover {
            background-color: #c9302c;
        }

        /* Content Style */
        .content {
            margin-left: 250px;
            padding: 40px;
            background-color: #f4f4f4;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        .content h1 {
            font-size: 32px;
            margin-bottom: 20px;
            text-align: center;
        }

        .card {
            margin-top: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 25px;
        }

        /* Hero Section */
        .hero-section {
            background: #007bff;
            color: white;
            padding: 80px 0;
            text-align: center;
            margin-bottom: 30px;
            border-radius: 10px;
        }

        .hero-section h1 {
            font-size: 36px;
            font-weight: 700;
        }

        .hero-section p {
            font-size: 18px;
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 1.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2>Admin Dashboard</h2>
    <a href="{{ route('users.index') }}"><i class="fa fa-users"></i> Manage Users</a>
    <a href="{{ route('bahan_baku.index') }}"><i class="fa fa-cogs"></i> Mengelola Bahan Baku</a>
    <a href="{{ route('suppliers.index') }}"><i class="fa fa-industry"></i> Mengelola Supplier</a>
    <a href="{{ route('products.index') }}"><i class="fa fa-product-hunt"></i> Mengelola Product</a>

    <!-- Logout Button -->
    <center><form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form></center>
</div>

<!-- Main Content -->
<div class="content">
    <!-- Hero Section -->
    <div class="hero-section fade-in">
        <h1>Selamat Datang di Admin Dashboard</h1>
        <p>Anda dapat mengatur beberapa menu yang tersedia.</p>
    </div>

    <h1 class="fade-in">Dashboard Menu</h1>
    
    <div class="card fade-in">
        <div class="card-header">User Management</div>
        <div class="card-body">
            <p>Disini kalian dapat mengatur beberapa akun yang ingin ditambahkan.</p>
            <a href="{{ route('users.index') }}" class="btn btn-primary btn-lg">Go to User Management</a>
        </div>
    </div>

    <div class="card fade-in">
        <div class="card-header">Product Management</div>
        <div class="card-body">
            <p>Disini kalian dapat mengatur beberapa produk dan mengatur stock produk.</p>
            <a href="{{ route('products.index') }}" class="btn btn-success btn-lg">Go to Product Management</a>
        </div>
    </div>

    <div class="card fade-in">
        <div class="card-header">Bahan Baku Management</div>
        <div class="card-body">
            <p>Disini kalian dapat mengatur beberapa stock bahan baku.</p>
            <a href="{{ route('bahan_baku.index') }}" class="btn btn-primary btn-lg">Go to Bahan Baku Management</a>
        </div>
    </div>

    <div class="card fade-in">
        <div class="card-header">Supplier Management</div>
        <div class="card-body">
            <p>Disini kalian dapat mengatur beberapa supplier yang telah dicatat.</p>
            <a href="{{ route('suppliers.index') }}" class="btn btn-success btn-lg">Go to Supplier Management</a>
        </div>
    </div>
</div>

<!-- Optional Bootstrap JS and Popper.js for improved interaction -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
