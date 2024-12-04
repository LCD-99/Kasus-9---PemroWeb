<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
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
            text-align: center;
        }
        .btn-custom {
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-edit {
            background-color: #5bc0de;
            color: white;
        }
        .btn-edit:hover {
            background-color: #31b0d5;
        }
        .btn-delete {
            background-color: #d9534f;
            color: white;
        }
        .btn-delete:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="mb-4 text-center">Daftar Produk</h1>

    <!-- Menampilkan pesan jika berhasil menambahkan produk -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol untuk menambah produk -->
    <div class="mb-3 text-end">
        <a href="{{ route('products.create') }}" class="btn btn-success">Tambah Produk</a>
    </div>

    <!-- Tabel untuk menampilkan produk -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stok }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $product->status)) }}</td>
                    <td>
                        <!-- Link untuk mengedit produk -->
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-edit btn-custom">Edit</a> |
                        <!-- Form untuk menghapus produk -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete btn-custom" onclick="return confirm('Yakin ingin menghapus produk?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Optional Bootstrap JS
