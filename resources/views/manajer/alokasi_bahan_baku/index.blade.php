<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alokasi Bahan Baku</title>
    <style>
        /* Reset default styles */
        body, h1, table {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f3f4f6;  /* Background soft light gray */
            color: #333;
            padding: 20px;
        }

        h1 {
            color: #5e6c6d;  /* Soft greenish-gray */
            text-align: center;
            margin-bottom: 20px;
            font-size: 2em;
            font-weight: 600;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Light shadow */
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #6c757d;  /* Dark grayish */
            color: white;
            font-size: 1.1em;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa; /* Light gray background for even rows */
        }

        tr:hover {
            background-color: #f1f3f5; /* Light hover effect */
        }

        /* Button styling */
        .btn {
            padding: 10px 15px;
            color: white;
            background-color: #ffc107; /* Green color */
            text-decoration: none;
            border-radius: 8px;  /* Rounded corners for button */
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #218838;  /* Darker green on hover */
        }

        /* Alert styling */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 14px;
            color: white;
            font-weight: 500;
        }

        .alert-success {
            background-color: #28a745;  /* Green alert for success */
        }

        .alert-warning {
            background-color: #ffc107;  /* Yellow alert for warnings */
        }

        .alert-danger {
            background-color: #dc3545;  /* Red alert for errors */
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5em;
            }
            
            table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Alokasi Bahan Baku</h1>
        
        <!-- Tampilkan notifikasi jika ada sukses/tambah data -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol untuk menambah alokasi bahan baku -->
        <a href="{{ route('manajer.alokasi_bahan_baku.create') }}" class="btn mb-3">Tambah Alokasi Bahan Baku</a>

        <!-- Tabel daftar alokasi bahan baku -->
        <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Jadwal Produksi</th>
                <th>Bahan Baku</th>
                <th>Jumlah Bahan Baku</th>
                <th>Stok Produk</th> <!-- Menampilkan stok produk -->
                <th>Harga Bahan Baku</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alokasiBahanBaku as $index => $alokasi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $alokasi->jadwalProduksi->produk->name }}</td> <!-- Nama Produk -->
                    <td>{{ $alokasi->jadwalProduksi->tanggal_produksi }}</td> <!-- Jadwal Produksi -->
                    <td>{{ $alokasi->bahanBaku->nama_bahan }}</td> <!-- Nama Bahan Baku -->
                    <td>{{ $alokasi->jumlah_bahan_baku }}</td> <!-- Jumlah Bahan Baku -->
                    <td>{{ $alokasi->jadwalProduksi->produk->stok }}</td> <!-- Menampilkan Stok Produk -->
                    <td>{{ $alokasi->bahanBaku->harga }}</td> <!-- Harga Bahan Baku -->
                    <td>
                        <a href="{{ route('manajer.alokasi_bahan_baku.edit', $alokasi->id) }}" class="btn">Edit</a>
                        <form action="{{ route('manajer.alokasi_bahan_baku.destroy', $alokasi->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" style="background-color: #dc3545;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <a href="{{ route('dashboard') }}" class="btn btn-primary mb-3">Kembali ke Dashboard</a>
</div>
  
</body>
</html>
