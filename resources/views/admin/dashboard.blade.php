<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Optional Bootstrap for better styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            display: flex;
            flex-direction: column;
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
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

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

        .logout-btn:focus {
            outline: none;
        }

        /* Content Style */
        .content {
            margin-left: 250px;
            padding: 40px;
            background-color: #f4f4f4;
            min-height: 100vh;
        }

        .content h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 18px;
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

    <!-- Logout Button -->
    <center><form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form></center>
</div>

<!-- Main Content -->
<div class="content">
    <h1>Welcome Admin</h1>
    <p>Here is where you can manage users, suppliers, products, and more. Use the navigation menu on the left to access different sections.</p>

    <!-- Placeholder for other content -->
    <div>
        <!-- Display your data here -->
        <h3>Data Section</h3>
        <p>Details and stats about your users, products, or other data can be placed here.</p>
    </div>
</div>

<!-- Optional Bootstrap JS and Popper.js for improved interaction -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
