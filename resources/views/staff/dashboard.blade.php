<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
            background-color: #f4f4f9;
        }
        /* Sidebar styling */
        .sidebar {
            width: 250px;
            height: 100%;
            background-color: #333;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.5rem;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            margin-bottom: 10px;
            border-radius: 5px;
            display: block;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #575757;
        }
        /* Main content */
        .content {
            margin-left: 250px;
            padding: 30px;
            flex-grow: 1;
            background-color: #fff;
            overflow-y: auto;
        }
        .content h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #d32f2f;
        }
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .content {
                margin-left: 200px;
            }
        }
        @media (max-width: 480px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .content {
                margin-left: 0;
                padding: 15px;
            }
            .sidebar a {
                font-size: 0.9rem;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Staff Menu</h2>
        <a href="{{ route('penerimaan_bahan_baku.index') }}">Menerima Bahan Baku</a>
        <a href="{{ route('pemasukan.index') }}">Pemasukan</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    </div>

    <!-- Main content -->
    <div class="content">
        <h1>Welcome to the Staff Dashboard</h1>
        <p>Manage and track all your tasks here. Feel free to explore the available options on the left.</p>
        <button class="btn" onclick="window.location.href='{{ route('penerimaan_bahan_baku.index') }}'">Go to Bahan Baku</button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</body>
</html>
