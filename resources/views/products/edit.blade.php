<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <!-- Link ke CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
        }

        .container {
            margin-top: 60px;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-label {
            font-weight: 600;
            font-size: 16px;
            color: #495057;
        }

        .form-control {
            border-radius: 10px;
            font-size: 14px;
            padding: 15px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        }

        .btn-custom {
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 30px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(90deg, #007bff, #0056b3);
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #0056b3, #007bff);
            transform: translateY(-3px);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-select {
            border-radius: 10px;
            padding: 15px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        }

        .text-center {
            margin-top: 30px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 25px;
            }

            .btn-custom {
                padding: 10px 20px;
                font-size: 14px;
            }

            .form-control, .form-select {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="mb-4 text-center">Edit Produk</h1>

    <!-- Form untuk mengedit produk -->
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Mengindikasikan bahwa ini adalah permintaan PUT untuk pembaruan -->

        <div class="form-group">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" name="nama_produk" value="{{ old('nama_produk', $product->nama_produk) }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" required>{{ old('deskripsi', $product->deskripsi) }}</textarea>
        </div>

        <div class="form-group">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" value="{{ old('harga', $product->harga) }}" required>
        </div>

        <div class="form-group">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" value="{{ old('stok', $product->stok) }}" required>
        </div>

        <div class="form-group">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" required>
                <option value="belum_diproses" {{ old('status', $product->status) == 'belum_diproses' ? 'selected' : '' }}>Pro Order</option>
                <option value="diproses" {{ old('status', $product->status) == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="sudah_jadi" {{ old('status', $product->status) == 'sudah_jadi' ? 'selected' : '' }}>Jadi</option>
            </select>
        </div>

        <div class="form-group text-center mt-4">
            <button type="submit" class="btn btn-primary btn-custom">Update Produk</button>
        </div>
    </form>
</div>

<!-- Link JS (Bootstrap JS dan Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
