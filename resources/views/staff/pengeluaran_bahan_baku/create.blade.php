<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catat Pengeluaran Bahan Baku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1 class="my-4">Catat Pengeluaran Bahan Baku</h1>

    <form action="/pengeluaran-bahan-baku/store" method="POST">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="csrf_token_here">

        <div class="mb-3">
            <label for="bahan_baku_id" class="form-label">Nama Bahan Baku</label>
            <select name="bahan_baku_id" class="form-control" required>
                <!-- Contoh data bahan baku -->
                <option value="1">Gula Pasir</option>
                <option value="2">Minyak Goreng</option>
                <option value="3">Tepung Terigu</option>
                <!-- End of Example -->
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Pengeluaran</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Pengeluaran</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
