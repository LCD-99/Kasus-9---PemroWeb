<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Produksi</title>
</head>
<body>
    <div class="container">
        <h1>Daftar Jadwal Produksi</h1>

        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tabel Daftar Jadwal Produksi -->
        <table border="1">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwals as $jadwal)
                    <tr>
                        <td>{{ $jadwal->tanggal }}</td>
                        <td>{{ $jadwal->produk->nama }}</td>
                        <td>{{ $jadwal->jumlah }}</td>
                        <td>
                            <a href="{{ route('manajer.jadwal_produksi.edit', $jadwal->id) }}">Edit</a> |
                            <form action="{{ route('manajer.jadwal_produksi.destroy', $jadwal->id) }}" method="POST" style="display:inline;">
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
        <a href="{{ route('manajer.jadwal_produksi.create') }}">Tambah Jadwal Produksi</a>
    </div>
</body>
</html>
