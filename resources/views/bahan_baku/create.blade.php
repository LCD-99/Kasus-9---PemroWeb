<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Bahan Baku</title>
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
        .form-label {
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="mb-4 text-center">Tambah Bahan Baku</h1>

    <!-- Form Tambah Bahan Baku -->
    <form action="{{ route('bahan_baku.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_bahan" class="form-label">Nama Bahan:</label>
            <input type="text" id="nama_bahan" name="nama_bahan" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="jumlah" class="form-label">Jumlah:</label>
            <input type="number" id="jumlah" name="jumlah" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="harga" class="form-label">Harga:</label>
            <input type="number" id="harga" name="harga" class="form-control" step="0.01" required>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>

</div>

<!-- Optional Bootstrap JS and Popper.js for improved interaction -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
