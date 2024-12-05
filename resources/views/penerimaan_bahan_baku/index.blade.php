<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penerimaan Bahan Baku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Daftar Penerimaan Bahan Baku</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Bahan Baku</th>
                    <th>Jumlah</th>
                    <th>Supplier</th>
                    <th>Pengguna</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penerimaan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_bahan_baku }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->supplier->name }}</td>
                    <td>{{ $item->user->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
