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

        <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Produk</th>
            <th>Tanggal Produksi</th>
            <th>Jumlah Produksi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jadwals as $jadwal)
        <tr>
            <td>{{ $jadwal->id }}</td>
            <td>{{ $jadwal->produk->name }}</td> <!-- Menampilkan nama produk -->
            <td>{{ $jadwal->tanggal_produksi }}</td>
            <td>{{ $jadwal->jumlah_produksi }}</td>
            <td>
                <!-- Tautan atau tombol aksi seperti edit atau delete -->
                <a href="{{ route('manajer.jadwal_produksi.edit', $jadwal->id) }}">Edit</a>
                <form action="{{ route('manajer.jadwal_produksi.destroy', $jadwal->id) }}" method="POST">
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
        <br>
        <a href="{{ route('manager.dashboard') }}">Kembali ke Dashboard</a>
    </div>
</body>
</html>
