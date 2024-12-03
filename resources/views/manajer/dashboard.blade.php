<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            margin: 0;
        }
        /* Sidebar styling */
        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding-top: 20px;
            position: fixed;
        }
        .sidebar a {
            display: block;
            padding: 15px;
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }

        /* Content area styling */
        .content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
        }

        .btn-logout {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-top: 20px;
            text-decoration: none;
        }

        .btn-logout:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2 style="text-align: center; color: white;">Manager Dashboard</h2>
        <a href="{{ route('manajer.jadwal_produksi.index') }}">Mengatur Jadwal Produksi</a>
        <a href="{{ route('manajer.alokasi_bahan_baku.index') }}">Mengatur Alokasi Bahan Baku</a>
        <!-- Add more links here if needed -->
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Welcome Manager</h1>
        
        <p>Here you can manage the production schedule and raw material allocations.</p>

        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>

</body>
</html>
