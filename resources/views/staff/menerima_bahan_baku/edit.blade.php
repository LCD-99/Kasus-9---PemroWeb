<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penerimaan Bahan Baku</title>
</head>
<body>
    <h1>Edit Penerimaan Bahan Baku</h1>

    <form action="{{ route('penerimaan_bahan_baku.update', $penerimaan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="user_id">User</label>
            <select name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $penerimaan->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="supplier_id">Supplier</label>
            <select name="supplier_id" required>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $supplier->id == $penerimaan->supplier_id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="nama_bahan_baku">Nama Bahan Baku</label>
            <input type="text" name="nama_bahan_baku" value="{{ $penerimaan->nama_bahan_baku }}" required>
        </div>
        <div>
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" value="{{ $penerimaan->jumlah }}" required>
        </div>
        <div>
            <label for="harga">Harga</label>
            <input type="number" name="harga" value="{{ $penerimaan->harga }}" required>
        </div>
        <div>
            <label for="tanggal_penerimaan">Tanggal Penerimaan</label>
            <input type="date" name="tanggal_penerimaan" value="{{ $penerimaan->tanggal_penerimaan }}" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
