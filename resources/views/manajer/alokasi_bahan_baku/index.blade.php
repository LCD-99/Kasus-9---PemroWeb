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
        
        <!-- Tampilkan notifikasi jika ada sukses/tambah data -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol untuk menambah alokasi bahan baku -->
        <a href="{{ route('manajer.alokasi_bahan_baku.create') }}" class="btn btn-primary mb-3">Tambah Alokasi Bahan Baku</a>

        <!-- Tabel daftar alokasi bahan baku -->
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Jadwal Produksi</th>
                <th>Bahan Baku</th>
                <th>Jumlah Bahan Baku</th>
                <th>Stok Produk</th> <!-- Menampilkan stok produk -->
                <th>Harga Bahan Baku</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alokasiBahanBaku as $index => $alokasi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $alokasi->jadwalProduksi->produk->name }}</td> <!-- Nama Produk -->
                    <td>{{ $alokasi->jadwalProduksi->tanggal_produksi }}</td> <!-- Jadwal Produksi -->
                    <td>{{ $alokasi->bahanBaku->nama_bahan }}</td> <!-- Nama Bahan Baku -->
                    <td>{{ $alokasi->jumlah_bahan_baku }}</td> <!-- Jumlah Bahan Baku -->
                    <td>{{ $alokasi->jadwalProduksi->produk->stok }}</td> <!-- Menampilkan Stok Produk -->
                    <td>{{ $alokasi->bahanBaku->harga }}</td> <!-- Harga Bahan Baku -->
                    <td>
                        <a href="{{ route('manajer.alokasi_bahan_baku.edit', $alokasi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('manajer.alokasi_bahan_baku.destroy', $alokasi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('dashboard') }}" class="btn btn-primary mb-3">Kembali ke Dashboard</a>
</div>
  
</body>
</html>
