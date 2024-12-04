<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bahan Baku</title>
    <!-- Link ke CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .btn-action {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="mb-4 text-center">Data Bahan Baku</h1>

    <!-- Tombol Tambah Bahan Baku -->
    <div class="text-end mb-3">
        <a href="{{ route('bahan_baku.create') }}" class="btn btn-success">Tambah Bahan Baku</a>
    </div>

    <!-- Tabel Data Bahan Baku -->
    <table class="table table-bordered table-striped">
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
                    <a href="{{ route('bahan_baku.edit', $bahan->id) }}" class="btn btn-primary btn-sm btn-action">Edit</a>
                    <form action="{{ route('bahan_baku.destroy', $bahan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-action">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
