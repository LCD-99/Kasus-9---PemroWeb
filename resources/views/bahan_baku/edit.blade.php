<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bahan Baku</title>
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
    <h1 class="mb-4 text-center">Edit Bahan Baku</h1>

    <!-- Form Edit Bahan Baku -->
    <form action="{{ route('bahan_baku.update', $bahanBaku->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_bahan" class="form-label">Nama Bahan:</label>
            <input type="text" id="nama_bahan" name="nama_bahan" class="form-control" value="{{ $bahanBaku->nama_bahan }}" required>
        </div>

        <div class="form-group">
            <label for="jumlah" class="form-label">Jumlah:</label>
            <input type="number" id="jumlah" name="jumlah" class="form-control" value="{{ $bahanBaku->jumlah }}" required>
        </div>

        <div class="form-group">
            <label for="harga" class="form-label">Harga:</label>
            <input type="number" id="harga" name="harga" class="form-control" value="{{ $bahanBaku->harga }}" step="0.01" required>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

</div>

<!-- Optional Bootstrap JS and Popper.js for improved interaction -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
