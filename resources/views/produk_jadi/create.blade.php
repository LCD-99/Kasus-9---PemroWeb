<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Jadi</title>
</head>
<body>

<h1>Tambah Produk Jadi</h1>

<form action="{{ route('produk_jadi.store') }}" method="POST">
    @csrf
    <label for="nama_produk">Nama Produk:</label>
    <input type="text" id="nama_produk" name="nama_produk" required>
    <br>
    <label for="stok">Stok:</label>
    <input type="number" id="stok" name="stok" required>
    <br>
    <label for="harga">Harga:</label>
    <input type="number" id="harga" name="harga" step="0.01" required>
    <br>
    <button type="submit">Simpan</button>
</form>

</body>
</html>
