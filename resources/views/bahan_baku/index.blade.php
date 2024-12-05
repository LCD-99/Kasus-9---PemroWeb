<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bahan Baku</title>
    <!-- Link ke CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40;
            padding-top: 30px;
            color: white;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar .btn {
            width: 100%;
            text-align: left;
            padding: 12px 20px;
            margin-bottom: 12px;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        }

        .sidebar .btn:hover {
            background-color: #495057;
            transform: translateX(10px); /* Tombol bergerak ke kanan */
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.15); /* Menambahkan bayangan saat tombol dihover */
        }

        .sidebar .btn-back {
            background-color: #f0ad4e;
        }

        .sidebar .btn-success {
            background-color: #28a745;
        }

        /* Main Content Styling */
        .content {
            flex-grow: 1;
            padding: 30px;
            background-color: #f8f9fa;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: bold;
        }

        .table th, .table td {
            vertical-align: middle;
            padding: 15px;
            text-align: center;
        }

        .table-striped tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .table-hover tbody tr:hover {
            background-color: #e9ecef;
        }

        /* Card Styling */
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h3 class="text-center text-white">Admin Panel</h3>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-back">
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
    </a>
    <a href="{{ route('bahan_baku.create') }}" class="btn btn-success">
        <i class="fa fa-plus" aria-hidden="true"></i> Tambah Bahan Baku
    </a>
</div>

<!-- Main Content Area -->
<div class="content">
    <div class="card">
        <div class="card-body">
            <h1>Data Bahan Baku</h1>

            <!-- Data Table -->
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Bahan</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bahanBaku as $bahan)
                    <tr>
                        <td>{{ $bahan->nama_bahan }}</td>
                        <td>{{ $bahan->jumlah }}</td>
                        <td>Rp {{ number_format($bahan->harga, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('bahan_baku.edit', $bahan->id) }}" class="btn btn-primary btn-sm btn-action">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                            </a>
                            <form action="{{ route('bahan_baku.destroy', $bahan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-action">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Optional Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
