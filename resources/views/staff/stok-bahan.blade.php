<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Stok Bahan Baku</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Stok Bahan Baku</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Stok Bahan Baku</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="expenseTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Bahan</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Tepung Terigu</td>
                            <td>50</td>
                            <td>2024-11-01</td>
                            <td>
                                <button class="btn btn-warning btn-sm btn-edit">Edit</button>
                                <button class="btn btn-danger btn-sm btn-delete">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tombol Tambah Data -->
        <button class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#addExpenseModal">Tambah Data</button>

        <!-- Modal Form Tambah Data -->
        <div class="modal fade" id="addExpenseModal" tabindex="-1" aria-labelledby="addExpenseModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addExpenseModalLabel">Tambah Data Bahan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="expenseForm">
                            <div class="form-group mb-3">
                                <label for="namaBahan">Nama Bahan</label>
                                <input type="text" class="form-control" id="namaBahan" placeholder="Masukkan Nama Bahan" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" placeholder="Masukkan Jumlah" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-danger" id="saveExpenseBtn">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Fungsi untuk menambahkan event listener pada tombol Edit dan Hapus
        function addRowListeners() {
            // Tombol Edit
            document.querySelectorAll('.btn-edit').forEach(button => {
                button.addEventListener('click', function () {
                    const row = this.closest('tr');
                    const cells = row.querySelectorAll('td');

                    // Isi form modal dengan data baris
                    document.getElementById('namaBahan').value = cells [1].textContent;
                    document.getElementById('jumlah').value = cells[2].textContent;
                    document.getElementById('tanggal').value = cells[3].textContent;

                    // Tandai baris yang sedang diedit
                    document.getElementById('saveExpenseBtn').setAttribute('data-row-index', row.rowIndex);

                    // Tampilkan modal
                    const modal = new bootstrap.Modal(document.getElementById('addExpenseModal'));
                    modal.show();
                });
            });

            // Tombol Hapus
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function () {
                    const row = this.closest('tr');
                    row.remove();
                });
            });
        }

        // Simpan data baru atau update data
        document.getElementById('saveExpenseBtn').addEventListener('click', function () {
            const table = document.getElementById('expenseTable').getElementsByTagName('tbody')[0];
            const rowIndex = this.getAttribute('data-row-index');

            if (rowIndex) {
                // Update data baris yang sudah ada
                const row = table.rows[rowIndex - 1];
                row.cells[1].textContent = document.getElementById('namaBahan').value;
                row.cells[2].textContent = document.getElementById('jumlah').value;
                row.cells[3].textContent = document.getElementById('tanggal').value;

                // Hapus atribut setelah selesai
                this.removeAttribute('data-row-index');
            } else {
                // Tambahkan baris baru
                const row = table.insertRow();
                row.innerHTML = `
                    <td>${table.rows.length}</td>
                    <td>${document.getElementById('namaBahan').value}</td>
                    <td>${document.getElementById('jumlah').value}</td>
                    <td>${document.getElementById('tanggal').value}</td>
                    <td>
                        <button class="btn btn-warning btn-sm btn-edit">Edit</button>
                        <button class="btn btn-danger btn-sm btn-delete">Hapus</button>
                    </td>
                `;
            }

            // Reset form
            document.getElementById('namaBahan').value = '';
            document.getElementById('jumlah').value = '';
            document.getElementById('tanggal').value = '';

            // Tambahkan event listener pada tombol baru
            addRowListeners();

            // Tutup modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('addExpenseModal'));
            modal.hide();
        });

        // Tambahkan event listener untuk data awal
        document.addEventListener('DOMContentLoaded', function () {
            addRowListeners();
        });
    </script>
</body>

</html>