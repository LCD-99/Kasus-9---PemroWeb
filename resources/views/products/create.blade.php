<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <!-- Link ke CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-custom {
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="mb-4 text-center">Tambah Produk</h1>

    <!-- Form untuk menambah produk -->
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>

        <div class="form-group">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" name="price" required>
        </div>

        <div class="form-group">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" required>
        </div>

        <div class="form-group">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" required>
                <option value="belum_diproses">Pre Order</option>
                <option value="diproses">Diproses</option>
                <option value="sudah_jadi">Jadi</option>
            </select>
        </div>

        <div class="form-group text-center mt-4">
            <button type="submit" class="btn btn-primary btn-custom">Simpan</button>
        </div>
    </form>
</div>

</body>
</html>
