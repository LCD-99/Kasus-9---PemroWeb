<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>

<h1>Tambah Produk</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nama Produk</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label for="description">Deskripsi</label>
        <textarea name="description" required></textarea>
    </div>
    <div>
        <label for="price">Harga</label>
        <input type="number" name="price" required>
    </div>
    <div>
        <label for="stok">Stok</label>
        <input type="number" name="stok" required>
    </div>
    <div>
        <label for="status">Status</label>
        <select name="status" required>
            <option value="belum_diproses">Pre Order</option>
            <option value="diproses">Diproses</option>
            <option value="sudah_jadi">Jadi</option>
        </select>
    </div>
    <button type="submit">Simpan</button>
</form>


</body>
</html>
