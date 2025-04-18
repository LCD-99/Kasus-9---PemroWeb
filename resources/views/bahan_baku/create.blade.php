<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Bahan Baku</title>
    <!-- Link ke CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1f3f5;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background: #ffffff;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            padding: 15px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px; /* Mengurangi jarak antar form */
        }

        .form-control {
            border-radius: 10px;
            padding: 10px;
            font-size: 14px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #0056b3;
            box-shadow: 0 0 8px rgba(0, 86, 179, 0.3);
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            padding: 10px 18px;
            font-size: 16px;
            border-radius: 10px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
            transform: scale(1.05);
        }

        .btn-success:focus {
            outline: none;
        }

        .fade-in {
            animation: fadeIn 1.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .card-body {
            padding: 20px; /* Mengurangi padding pada card-body */
        }

        /* Responsive Design untuk perangkat kecil */
        @media (max-width: 768px) {
            .card {
                border-radius: 10px;
            }

            .btn-success {
                font-size: 14px;
                padding: 8px 15px;
            }

            .form-control {
                font-size: 12px;
                padding: 8px;
            }

            .container {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card fade-in">
        <div class="card-header">
            <i class="fa fa-plus"></i> Tambah Bahan Baku
        </div>
        <div class="card-body">
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
    </div>
</div>

<!-- Optional Bootstrap JS and Popper.js for improved interaction -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
