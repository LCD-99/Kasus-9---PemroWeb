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
                <div class="form-group">
                    <label for="produk_id">Produk</label>
                    <select name="produk_id" id="produk_id" class="form-control">
                        <option value="">Pilih Produk</option>
                        @foreach ($jadwals as $jadwal)
                            <option value="{{ $jadwal->id }}">{{ $jadwal->produk->name }} - {{ $jadwal->tanggal_produksi }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="bahan_baku_id">Bahan Baku</label>
                    <select name="bahan_baku_id" id="bahan_baku_id" class="form-control">
                        <option value="">Pilih Bahan Baku</option>
                        @foreach ($bahanBakus as $bahanBaku)
                            <option value="{{ $bahanBaku->id }}">{{ $bahanBaku->nama_bahan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="jumlah_bahan_baku">Jumlah Bahan Baku</label>
                    <input type="number" name="jumlah_bahan_baku" id="jumlah_bahan_baku" class="form-control" min="1" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('manajer.alokasi_bahan_baku.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>


        </div>

</body>
</html>
