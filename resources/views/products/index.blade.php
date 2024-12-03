<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>

<h1>Tambah Produk</h1>

<!-- Form untuk menambah produk -->
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div>
        <label for="nama_produk">Nama Produk</label>
        <input type="text" name="nama_produk" required>
    </div>
    <div>
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" required></textarea>
    </div>
    <div>
        <label for="harga">Harga</label>
        <input type="number" name="harga" required>
    </div>
    <div>
        <label for="stok">Stok</label>
        <input type="number" name="stok" required>
    </div>
    <div>
        <label for="status">Status</label>
        <select name="status" required>
            <option value="aktif">Aktif</option>
            <option value="tidak_aktif">Tidak Aktif</option>
        </select>
    </div>
    <button type="submit">Simpan</button>
</form>

</body>
</html>
