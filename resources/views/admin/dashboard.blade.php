<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
        }

        .sidebar a {
            padding: 8px 16px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            margin: 10px 0;
        }

        .sidebar a:hover {
            background-color: #575757;
            border-radius: 4px;
        }

        /* Content Style */
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Logout Button Style */
        .logout-btn {
            background-color: #d9534f;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2>Admin Dashboard</h2>
    <a href="{{ route('users.index') }}">Manage Users</a>
    <a href="{{ route('bahan_baku.index') }}">Mengelola Bahan Baku</a>
    <a href="{{ route('suppliers.index') }}">Mengelola Supplier</a>
    <a href="{{ route('products.index') }}">Mengelola Product</a>

</div>

<!-- Main Content -->
<div class="content">
    <h1>Welcome Admin</h1>

    <!-- Logout Form -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</div>

</body>
</html>
