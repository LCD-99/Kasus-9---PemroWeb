<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Alokasi Bahan Baku</title>
    <style>
        /* Reset default styles */
        body, h1, form, select, input, button {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f3f4f6; /* Background soft light gray */
            color: #333;
            padding: 20px;
        }

        h1 {
            color: #5e6c6d; /* Soft greenish-gray */
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Light shadow effect */
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
            cursor: pointer;
        }
 
        .form-group button:hover {
            background-color: #218838; /* Darker green when hovering */
        }

        .btn-secondary {
            padding: 12px 20px;
            color: #fff;
            background-color: #6c757d; /* Gray color */
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary:hover {
            background-color: #5a6268; /* Darker gray on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Alokasi Bahan Baku</h1>

        <form action="{{ route('manajer.alokasi_bahan_baku.update', $alokasi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="produk_id">Produk</label>
                <select name="produk_id" id="produk_id" class="form-control">
                    <!-- Pastikan kita menggunakan nilai yang ada di objek alokasi -->
                    <option value="{{ $alokasi->jadwalProduksi->produk_id }}" selected>
                        {{ $alokasi->jadwalProduksi->produk->name }}
                    </option>
                    @foreach ($jadwals as $jadwal)
                        <option value="{{ $jadwal->produk->id }}">{{ $jadwal->produk->name }} - {{ $jadwal->tanggal_produksi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="bahan_baku_id">Bahan Baku</label>
                <select name="bahan_baku_id" id="bahan_baku_id" class="form-control">
                    <option value="{{ $alokasi->bahanBaku->id }}" selected>
                        {{ $alokasi->bahanBaku->nama_bahan }}
                    </option>
                    @foreach ($bahanBakus as $bahanBaku)
                        <option value="{{ $bahanBaku->id }}">{{ $bahanBaku->nama_bahan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="jumlah_bahan_baku">Jumlah Bahan Baku</label>
                <input type="number" name="jumlah_bahan_baku" id="jumlah_bahan_baku" class="form-control" value="{{ old('jumlah_bahan_baku', $alokasi->jumlah_bahan_baku) }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('manajer.alokasi_bahan_baku.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
