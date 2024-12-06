<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alokasi Bahan Baku</title>
    <style>
        /* Reset default styles */
        body, h1, form, select, input, button {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f3f4f6;
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

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  /* Light shadow effect */
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 1.1em;
            color: #6c757d;
        }

        .form-group select, .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #f8f9fa;
        }

        .form-group select:focus, .form-group input:focus {
            border-color: #28a745; /* Green color for focus */
            outline: none;
        }

        .form-group button {
            padding: 12px 20px;
            color: white;
            background-color: #28a745; /* Green color */
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #218838; /* Darker green for hover */
        }

        .form-group a {
            padding: 12px 20px;
            text-decoration: none;
            color: #333;
            background-color: #6c757d;  /* Gray color */
            border-radius: 5px;
            font-size: 1.1em;
        }

        .form-group a:hover {
            background-color: #5a6268; /* Darker gray for hover */
        }

        /* Style untuk alert atau notifikasi */
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>Tambah Alokasi Bahan Baku</h1>

        <!-- Menampilkan notifikasi jika ada sukses/tambah data -->
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form tambah alokasi bahan baku -->
        <form action="{{ route('manajer.alokasi_bahan_baku.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="produk_id">Produk</label>
                <select name="produk_id" id="produk_id">
                    <option value="">Pilih Produk</option>
                    @foreach ($jadwals as $jadwal)
                        <option value="{{ $jadwal->id }}">{{ $jadwal->produk->name }} - {{ $jadwal->tanggal_produksi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="bahan_baku_id">Bahan Baku</label>
                <select name="bahan_baku_id" id="bahan_baku_id">
                    <option value="">Pilih Bahan Baku</option>
                    @foreach ($bahanBakus as $bahanBaku)
                        <option value="{{ $bahanBaku->id }}">{{ $bahanBaku->nama_bahan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="jumlah_bahan_baku">Jumlah Bahan Baku</label>
                <input type="number" name="jumlah_bahan_baku" id="jumlah_bahan_baku" min="1" required>
            </div>

            <div class="form-group">
                <button type="submit">Simpan</button>
                <a href="{{ route('manajer.alokasi_bahan_baku.index') }}">Kembali</a>
            </div>
        </form>


        </div>

</body>
</html>
