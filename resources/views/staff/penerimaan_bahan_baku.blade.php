<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Penerimaan Bahan Baku</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Penerimaan Bahan Baku</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Penerimaan Bahan Baku</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="receiptTable" width="100%" cellspacing="0">
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
                        <!-- Data penerimaan akan ditambahkan di sini -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tombol Tambah Data -->
        <button class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#addReceiptModal">Tambah Data</button>

        <!-- Modal Tambah Data -->
        <div class="modal fade" id="addReceiptModal" tabindex="-1" aria-labelledby="addReceiptModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addReceiptModalLabel">Tambah Data Penerimaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addReceiptForm">
                            <div class="mb-3">
                                <label for="namaBahan">Nama Bahan</label>
                                <input type="text" class="form-control" id="namaBahan" placeholder="Masukkan Nama Bahan" required>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" placeholder="Masukkan Jumlah" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-danger" id="saveDataButton">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const saveDataButton = document.getElementById("saveDataButton");
            const tableBody = document.querySelector("#receiptTable tbody");
            let editRowIndex = null;

            saveDataButton.addEventListener("click", function () {
                const namaBahan = document.getElementById("namaBahan").value;
                const jumlah = document.getElementById("jumlah").value;
                const tanggal = document.getElementById("tanggal").value;

                if (!namaBahan || !jumlah || !tanggal) {
                    alert("Harap isi semua data sebelum menyimpan!");
                    return;
                }

                if (editRowIndex !== null) {
                    // Update existing row
                    const row = tableBody.rows[editRowIndex];
                    row.cells[1].textContent = namaBahan;
                    row.cells[2].textContent = jumlah;
                    row.cells[3].textContent = tanggal;
                    editRowIndex = null; // Reset edit index
                } else {
                    // Add new row
                    const newRow = tableBody.insertRow();
                    newRow.innerHTML = `
                        <td>${tableBody.rows.length}</td>
                        <td>${namaBahan}</td>
                        <td>${jumlah}</td>
                        <td>${tanggal}</td>
                        <td>
                            <button class="btn btn-warning btn-sm btn-edit">Edit</button>
                            <button class="btn btn-danger btn-sm btn-delete">Hapus</button>
                        </td>
                    `;
                }

                document.getElementById("addReceiptForm").reset();
                const modal = bootstrap.Modal.getInstance(document.getElementById("addReceiptModal"));
                modal.hide();
                addRowListeners();
            });

            function addRowListeners() {
                document.querySelectorAll('.btn-edit').forEach(button => {
                    button.addEventListener('click', function () {
                        const row = this.closest('tr');
                        const cells = row.querySelectorAll('td');

                        document.getElementById('namaBahan').value = cells[1].textContent;
                        document.getElementById('jumlah').value = cells[2].textContent;
                        document.getElementById('tanggal').value = cells[3].textContent;

                        editRowIndex = Array.from(tableBody.rows).indexOf(row); // Get the index of the row being edited
                        const modal = new bootstrap.Modal(document.getElementById('addReceiptModal'));
                        modal.show();
                    });
                });

                document.querySelectorAll('.btn-delete').forEach(button => {
                    button.addEventListener('click', function () {
                        const row = this.closest('tr');
                        row.remove();
                        // Update row IDs after deletion
                        Array.from(tableBody.rows).forEach((row, index) => {
                            row.cells[0].textContent = index + 1; // Update ID column
                        });
                    });
                });
            }

            addRowListeners();
        });
    </script>
</body>

</html>
