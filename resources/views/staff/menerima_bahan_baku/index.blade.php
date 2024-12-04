<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penerimaan Bahan Baku</title>
</head>
<body>
    <h1>Daftar Penerimaan Bahan Baku</h1>

    <a href="{{ route('penerimaan_bahan_baku.create') }}">Tambah Penerimaan</a>

    <table>
        <thead>
            <tr>
                <th>Nama Bahan Baku</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Tanggal Penerimaan</th>
                <th>Supplier</th>
                <th>User</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penerimaan as $item)
                <tr>
                    <td>{{ $item->nama_bahan_baku }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>{{ $item->tanggal_penerimaan }}</td>
                    <td>{{ $item->supplier->name }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>
                        <a href="{{ route('penerimaan_bahan_baku.edit', $item->id) }}">Edit</a>
                        <form action="{{ route('penerimaan_bahan_baku.destroy', $item->id) }}" method="POST" style="display:inline;">
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
