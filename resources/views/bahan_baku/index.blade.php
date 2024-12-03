<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bahan Baku</title>
</head>
<body>

<h1>Data Bahan Baku</h1>

<a href="{{ route('bahan_baku.create') }}">Tambah Bahan Baku</a>

<table border="1">
    <thead>
        <tr>
            <th>Nama Bahan</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bahanBaku as $bahan)
        <tr>
            <td>{{ $bahan->nama_bahan }}</td>
            <td>{{ $bahan->jumlah }}</td>
            <td>{{ $bahan->harga }}</td>
            <td>
                <a href="{{ route('bahan_baku.edit', $bahan->id) }}">Edit</a>
                <form action="{{ route('bahan_baku.destroy', $bahan->id) }}" method="POST" style="display:inline;">
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
