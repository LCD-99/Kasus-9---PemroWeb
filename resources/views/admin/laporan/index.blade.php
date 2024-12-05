<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Laporan Admin</h1>

        <!-- Tabs for different sections -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="produksi-tab" data-bs-toggle="tab" href="#produksi" role="tab" aria-controls="produksi" aria-selected="true">Laporan Produksi</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="penggunaan-tab" data-bs-toggle="tab" href="#penggunaan" role="tab" aria-controls="penggunaan" aria-selected="false">Penggunaan Bahan Baku</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="stok-tab" data-bs-toggle="tab" href="#stok" role="tab" aria-controls="stok" aria-selected="false">Stok Barang</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            
            <!-- Laporan Produksi -->
            <div class="tab-pane fade show active" id="produksi" role="tabpanel" aria-labelledby="produksi-tab">
                <h3>Laporan Produksi</h3>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Produksi</th>
                            <th>Jumlah Produksi</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produksi as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_produksi }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->tanggal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Penggunaan Bahan Baku -->
            <div class="tab-pane fade" id="penggunaan" role="tabpanel" aria-labelledby="penggunaan-tab">
                <h3>Penggunaan Bahan Baku</h3>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Bahan Baku</th>
                            <th>Jumlah Digunakan</th>
                            <th>Tanggal Penggunaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penggunaan_bahan_baku as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_bahan_baku }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->tanggal_penggunaan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Stok Barang -->
            <div class="tab-pane fade" id="stok" role="tabpanel" aria-labelledby="stok-tab">
                <h3>Stok Barang</h3>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Stok Tersedia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stok_barang as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->stok }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
