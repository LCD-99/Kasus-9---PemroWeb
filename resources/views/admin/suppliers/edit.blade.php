<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
    <!-- Link CSS (Bootstrap) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 70px;
        }

        .card {
            border-radius: 25px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 30px;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card-header {
            background-color: #ff6347;
            color: white;
            text-align: center;
            font-size: 32px;
            font-weight: 600;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            padding: 25px;
        }

        .form-label {
            font-weight: 600;
            font-size: 18px;
            color: #333;
        }

        .form-control {
            border-radius: 12px;
            padding: 18px;
            font-size: 16px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #ff6347;
            box-shadow: 0 0 10px rgba(255, 99, 71, 0.2);
        }

        .btn-primary {
            background-color: #ff6347;
            border-color: #ff6347;
            font-size: 20px;
            padding: 14px 24px;
            border-radius: 15px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 48%;
        }

        .btn-primary:hover {
            background-color: #e55347;
            border-color: #e55347;
            transform: scale(1.05);
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            font-size: 20px;
            padding: 14px 24px;
            border-radius: 15px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 48%;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
            transform: scale(1.05);
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #777;
            font-weight: 600;
        }

        /* Animasi fade-in untuk card */
        .card {
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .card {
                border-radius: 20px;
                padding: 25px;
            }

            .btn-primary, .btn-secondary {
                font-size: 18px;
                padding: 12px 18px;
            }

            .form-control {
                font-size: 15px;
                padding: 16px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-pencil-square"></i> Edit Supplier
        </div>
        <div class="card-body">
            <!-- Form untuk mengedit supplier -->
            <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Metode HTTP PUT untuk memperbarui data -->

                <div class="mb-3">
                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                    <input type="text" name="nama_supplier" class="form-control" value="{{ old('nama_supplier', $supplier->nama_supplier) }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $supplier->alamat) }}" required>
                </div>
                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak</label>
                    <input type="text" name="kontak" class="form-control" value="{{ old('kontak', $supplier->kontak) }}" required>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 Supplier Management System</p>
    </div>
</div>

<!-- Link JS (Bootstrap JS dan Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
