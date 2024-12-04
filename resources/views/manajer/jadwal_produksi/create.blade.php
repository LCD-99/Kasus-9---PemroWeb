<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Produksi</title>
</head>
<body>
    <div class="container">
        <h1>Tambah Jadwal Produksi</h1>

        <form action="{{ route('manajer.jadwal_produksi.store') }}" method="POST">
    @csrf
    <div>
        <label for="tanggal">Tanggal</label>
        <input type="date" id="tanggal" name="tanggal" required>
    </div>
    <div>
        <label for="produk_id">Produk</label>
        <select name="produk_id" id="produk_id" required>
            @foreach($products as $produk)
                <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="jumlah">Jumlah</label>
        <input type="number" id="jumlah" name="jumlah" required>
    </div>

                <br><br>
                <button type="submit">Simpan</button>
                <a href="{{ route('manajer.jadwal_produksi.index') }}">Kembali</a>
            </form>


    </div>
</body>
</html>
