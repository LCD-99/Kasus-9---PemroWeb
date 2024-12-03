<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alokasi Bahan Baku</title>
</head>
<body>
    <div class="container">
        <h1>Daftar Alokasi Bahan Baku</h1>

        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tabel Daftar Alokasi Bahan Baku -->
        <table border="1">
            <thead>
                <tr>
                    <th>Nama Bahan Baku</th>
                    <th>Jadwal Produksi</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($AlokasiBahanBaku as $alokasi)
                    <tr>
                        <td>{{ $alokasi->bahanBaku->nama }}</td>
                        <td>{{ $alokasi->jadwalProduksi->tanggal }}</td>
                        <td>{{ $alokasi->jumlah }}</td>
                        <td>
                            <a href="{{ route('manajer.alokasi_bahan_baku.edit', $alokasi->id) }}">Edit</a> |
                            <form action="{{ route('manajer.alokasi_bahan_baku.destroy', $alokasi->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        <a href="{{ route('manajer.alokasi_bahan_baku.create') }}">Tambah Alokasi Bahan Baku</a>
    </div>
</body>
</html>
