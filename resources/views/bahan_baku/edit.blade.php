<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bahan Baku</title>
</head>
<body>

<h1>Edit Bahan Baku</h1>

<form action="{{ route('bahan_baku.update', $bahanBaku->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nama_bahan">Nama Bahan:</label>
    <input type="text" id="nama_bahan" name="nama_bahan" value="{{ $bahanBaku->nama_bahan }}" required>
    <br>
    <label for="jumlah">Jumlah:</label>
    <input type="number" id="jumlah" name="jumlah" value="{{ $bahanBaku->jumlah }}" required>
    <br>
    <label for="harga">Harga:</label>
    <input type="number" id="harga" name="harga" value="{{ $bahanBaku->harga }}" step="0.01" required>
    <br>
    <button type="submit">Update</button>
</form>

</body>
</html>
