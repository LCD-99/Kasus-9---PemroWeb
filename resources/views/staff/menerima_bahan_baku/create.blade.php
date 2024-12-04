<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penerimaan Bahan Baku</title>
</head>
<body>
    <h1>Tambah Penerimaan Bahan Baku</h1>

    <form action="{{ route('penerimaan_bahan_baku.store') }}" method="POST">
        @csrf
        <div>
            <label for="user_id">User</label>
            <select name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="supplier_id">Supplier</label>
            <select name="supplier_id" required>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="nama_bahan_baku">Nama Bahan Baku</label>
            <input type="text" name="nama_bahan_baku" required>
        </div>
        <div>
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" required>
        </div>
        <div>
            <label for="harga">Harga</label>
            <input type="number" name="harga" required>
        </div>
        <div>
            <label for="tanggal_penerimaan">Tanggal Penerimaan</label>
            <input type="date" name="tanggal_penerimaan" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
