<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk Jadi</title>
</head>
<body>

<h1>Data Produk Jadi</h1>

<a href="{{ route('produk_jadi.create') }}">Tambah Produk Jadi</a>

<table border="1">
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produkJadi as $produk)
        <tr>
            <td>{{ $produk->nama_produk }}</td>
            <td>{{ $produk->stok }}</td>
            <td>{{ $produk->harga }}</td>
            <td>
                <a href="{{ route('produk_jadi.edit', $produk->id) }}">Edit</a>
                <form action="{{ route('produk_jadi.destroy', $produk->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
