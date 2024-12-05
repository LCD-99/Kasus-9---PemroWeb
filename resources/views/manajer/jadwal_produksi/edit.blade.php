<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal Produksi</title>
    <!-- Link CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link Icons Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom Styling -->
    <style>
        .container {
            max-width: 800px;
            margin-top: 50px;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .btn-primary {
            width: 100%;
        }
        .form-control {
            height: calc(2.25rem + 2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Edit Jadwal Produksi</h1>

        <form action="{{ route('manajer.jadwal_produksi.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Produk -->
            <div class="form-group">
                <label for="produk_id">Produk</label>
                <select name="produk_id" id="produk_id" class="form-control" required>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $jadwal->produk_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Produksi -->
            <div class="form-group">
                <label for="tanggal_produksi">Tanggal Produksi</label>
                <input type="date" name="tanggal_produksi" id="tanggal_produksi" class="form-control" value="{{ $jadwal->tanggal_produksi }}" required>
            </div>

            <!-- Jumlah Produksi -->
            <div class="form-group">
                <label for="jumlah_produksi">Jumlah Produksi</label>
                <input type="number" name="jumlah_produksi" id="jumlah_produksi" class="form-control" value="{{ $jadwal->jumlah_produksi }}" required min="1">
            </div>

            <!-- Tombol Update -->
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-pencil"></i> Update
                </button>
            </div>

            <!-- Tombol Kembali -->
            <div class="form-group mt-2">
                <a href="{{ route('manajer.jadwal_produksi.index') }}" class="btn btn-secondary w-100">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>
            </div>
        </form>
    </div>

    <!-- JS Bootstrap dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
