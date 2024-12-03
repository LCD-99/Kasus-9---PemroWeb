<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Bahan Baku</title>
</head>
<body>

<h1>Tambah Bahan Baku</h1>

<form action="{{ route('bahan_baku.store') }}" method="POST">
    @csrf
    <label for="nama_bahan">Nama Bahan:</label>
    <input type="text" id="nama_bahan" name="nama_bahan" required>
    <br>
    <label for="jumlah">Jumlah:</label>
    <input type="number" id="jumlah" name="jumlah" required>
    <br>
    <label for="harga">Harga:</label>
    <input type="number" id="harga" name="harga" step="0.01" required>
    <br>
    <button type="submit">Simpan</button>
</form>

</body>
</html>
