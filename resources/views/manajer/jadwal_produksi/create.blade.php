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
                    <label for="tanggal_produksi">Tanggal Produksi</label>
                    <input type="date" name="tanggal_produksi" id="tanggal_produksi" required>
                </div>

            <div>
                <label for="produk_id">Produk</label>
                <select name="produk_id" id="produk_id" required>
                <option value="">Pilih Produk</option>
                @foreach($products as $produk)
                    <option value="{{ $produk->id }}">{{ $produk->name }}</option>
                @endforeach
                </select>
            </div>

            <div>
            <div>
                <label for="jumlah_produksi">Jumlah Produksi</label>
                <input type="number" name="jumlah_produksi" id="jumlah_produksi" required>
            </div>

            </div>
            </div>
                <br><br>
                <button type="submit">Simpan</button>
                <a href="{{ route('manajer.jadwal_produksi.index') }}">Kembali</a>
        </form>


    </div>
</body>
</html>
