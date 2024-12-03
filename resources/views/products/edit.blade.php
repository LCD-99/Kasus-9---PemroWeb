<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>

<h1>Edit Produk</h1>

<!-- Form untuk mengedit produk -->
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Mengindikasikan bahwa ini adalah permintaan PUT untuk pembaruan -->
    
    <div>
        <label for="nama_produk">Nama Produk</label>
        <input type="text" name="nama_produk" value="{{ old('nama_produk', $product->nama_produk) }}" required>
    </div>
    <div>
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" required>{{ old('deskripsi', $product->deskripsi) }}</textarea>
    </div>
    <div>
        <label for="harga">Harga</label>
        <input type="number" name="harga" value="{{ old('harga', $product->harga) }}" required>
    </div>
    <div>
        <label for="stok">Stok</label>
        <input type="number" name="stok" value="{{ old('stok', $product->stok) }}" required>
    </div>
    <div>
        <label for="status">Status</label>
        <select name="status" required>
            <option value="belum_diproses" {{ old('status', $product->status) == 'belum_diproses' ? 'selected' : '' }}>Pro Order</option>
            <option value="diproses" {{ old('status', $product->status) == 'diproses' ? 'selected' : '' }}>Diproses</option>
            <option value="sudah_jadi" {{ old('status', $product->status) == 'sudah_jadi' ? 'selected' : '' }}>Jadi</option>
        </select>
    </div>
    <button type="submit">Update</button>
</form>

</body>
</html>
