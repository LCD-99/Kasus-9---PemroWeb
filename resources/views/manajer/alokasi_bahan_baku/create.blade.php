<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alokasi Bahan Baku</title>
</head>
<body>
    <div class="container">
        <h1>Tambah Alokasi Bahan Baku</h1>

        <form action="{{ route('manajer.alokasi_bahan_baku.store') }}" method="POST">
            @csrf
            <div>
                <label for="bahan_baku_id">Bahan Baku</label>
                <select name="bahan_baku_id" id="bahan_baku_id" required>
                    @foreach($bahanBakus as $bahanBaku)
                        <option value="{{ $bahanBaku->id }}">{{ $bahanBaku->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="jadwal_produksi_id">Jadwal Produksi</label>
                <select name="jadwal_produksi_id" id="jadwal_produksi_id" required>
                    @foreach($jadwals as $jadwal)
                        <option value="{{ $jadwal->id }}">{{ $jadwal->tanggal }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="jumlah">Jumlah</label>
                <input type="number" id="jumlah" name="jumlah" required>
            </div>

            <br><br>
            <button type="submit">Simpan</button>
            <a href="{{ route('manajer.alokasi_bahan_baku.index') }}">Kembali</a>
        </form>
    </div>
</body>
</html>
