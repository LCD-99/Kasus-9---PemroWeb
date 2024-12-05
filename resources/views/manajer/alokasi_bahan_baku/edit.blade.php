<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Alokasi Bahan Baku</title>
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

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="{{ route('manajer.alokasi_bahan_baku.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar</a>
</div>

</body>
</html>