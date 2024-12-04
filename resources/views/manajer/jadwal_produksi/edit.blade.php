<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal Produksi</title>
</head>
<body>
    <div class="container">
        <h1>Edit Jadwal Produksi</h1>

            <form action="{{ route('manajer.jadwal_produksi.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="produk_id">Produk</label>
                <select name="produk_id" id="produk_id">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $jadwal->produk_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>

                <label for="tanggal_produksi">Tanggal Produksi</label>
                <input type="date" name="tanggal_produksi" value="{{ $jadwal->tanggal_produksi }}">

                <label for="jumlah_produksi">Jumlah Produksi</label>
                <input type="number" name="jumlah_produksi" value="{{ $jadwal->jumlah_produksi }}">

                <button type="submit">Update</button>
            </form>
    </div>
</body>
</html>
