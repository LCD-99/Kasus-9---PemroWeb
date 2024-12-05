<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Produksi</title>
    <!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Include Icons untuk tombol edit dan hapus -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Daftar Jadwal Produksi</h1>

        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Tabel Jadwal Produksi -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Produk</th>
                        <th>Tanggal Produksi</th>
                        <th>Jumlah Produksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwals as $jadwal)
                    <tr>
                        <td>{{ $jadwal->id }}</td>
                        <td>{{ $jadwal->produk->name }}</td> <!-- Menampilkan nama produk -->
                        <td>{{ \Carbon\Carbon::parse($jadwal->tanggal_produksi)->format('d-m-Y') }}</td> <!-- Format tanggal -->
                        <td>{{ $jadwal->jumlah_produksi }}</td>
                        <td class="d-flex gap-2">
                            <!-- Tombol Edit -->
                            <a href="{{ route('manajer.jadwal_produksi.edit', $jadwal->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <!-- Form Hapus -->
                            <form action="{{ route('manajer.jadwal_produksi.destroy', $jadwal->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tombol Tambah Jadwal -->
        <div class="mt-3">
            <a href="{{ route('manajer.jadwal_produksi.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Jadwal Produksi
            </a>
        </div>

        <!-- Tombol Kembali ke Dashboard -->
        <div class="mt-3">
            <a href="{{ route('manager.dashboard') }}" class="btn btn-secondary">
                <i class="bi bi-house-door"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

    <!-- Link JS Bootstrap dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
