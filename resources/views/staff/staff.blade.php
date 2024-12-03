<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Staff Dashboard">
    <meta name="author" content="">

    <title>Staff Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="staff-dashboard.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-user"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Staff Panel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="staff-dashboard.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- stok bahan baku -->
            <li class="nav-item">
                <a class="nav-link" href="stok-bahan.html">
                    <i class="fas fa-fw fa-tasks"></i>
                    <span>Stok Bahan Baku</span>
                </a>
            </li>

            <!-- penerimaan -->
            <li class="nav-item">
                <a class="nav-link" href="penerimaan-bahan.html">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Penerimaan</span>
                </a>
            </li>

            <!-- Pengeluaran -->
            <li class="nav-item">
                <a class="nav-link" href="pengeluaran-bahan.html">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pengeluaran</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Logout -->
            <li class="nav-item">
                <a class="nav-link" href="login.html">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Staff</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.html">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="settings.html">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.html">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Staff Gudang</h1>
                    </div>
                
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Stok Bahan Baku -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Stok Bahan Baku</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">100 Items</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <!-- Penerimaan Bahan Baku -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Penerimaan Bahan Baku</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">30 Transaksi</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-truck-loading fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <!-- Pengeluaran Bahan Baku -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Pengeluaran Bahan Baku</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">20 Transaksi</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dolly-flatbed fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Staff Dashboard 2024</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // API URL
        const apiUrl = "http://localhost/api/getData.php";
    
        // Ambil data dari API
        fetch(apiUrl)
            .then((response) => response.json())
            .then((data) => {
                // Perbarui tampilan jumlah item/transaksi
                document.querySelector(".stok-bahan .h5").textContent = `${data.stok_bahan} Items`;
                document.querySelector(".penerimaan-bahan .h5").textContent = `${data.penerimaan_bahan} Transaksi`;
                document.querySelector(".pengeluaran-bahan .h5").textContent = `${data.pengeluaran_bahan} Transaksi`;
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
            });
    });
    </script>
    
</body>

</html>
