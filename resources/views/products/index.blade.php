<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
</head>
<body>

<h1>Daftar Produk</h1>

<!-- Tombol untuk menambah produk -->
<a href="{{ route('products.create') }}">Tambah Produk</a>

<!-- Menampilkan pesan jika berhasil menambahkan produk -->
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<!-- Tabel untuk menampilkan produk -->
<table border="1">
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stok }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $product->status)) }}</td>
                <td>
                    <!-- Link untuk mengedit produk -->
                    <a href="{{ route('products.edit', $product->id) }}">Edit</a> |
                    <!-- Form untuk menghapus produk -->
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus produk?')" style="color: red;">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
