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
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            color: #333;
        }

        .container {
            margin-top: 50px;
            padding: 30px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-label {
            font-weight: 600;
            font-size: 16px;
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
            border-radius: 50px;
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
            margin-bottom: 20px;
        }

        .text-center {
            margin-top: 20px;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
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
    <h1 class="text-center mb-4">Tambah Produk</h1>

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

<!-- Link JS (Bootstrap JS dan Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
