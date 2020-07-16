<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('manajer/index') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-hotel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hotelly</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Manajer
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('manajer/index') ?>">
            <i class="fa fa-user"></i>
            <span>My Profile</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('manajer/lihat_barang') ?>">
            <i class="fa fa-table" aria-hidden="true"></i>
            <span>Data Total Barang</span></a>
    </li>

    <li class=" nav-item">
        <a class="nav-link" href="<?= base_url('manajer/lihat_barang_masuk') ?>">
            <i class="fa fa-table" aria-hidden="true"></i>
            <span>Data Barang Masuk</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('manajer/lihat_barang_keluar') ?>">
            <i class="fa fa-table" aria-hidden="true"></i>
            <span>Data Pengambilan Barang</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('manajer/lihat_barang_hilang') ?>">
            <i class="fa fa-table" aria-hidden="true"></i>
            <span>Data Barang Hilang</span></a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('manajer_job/index') ?>">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>Data Karyawan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('manajer_job/lihat_list_kategori') ?>">
            <i class="fa fa-list" aria-hidden="true"></i>
            <span>List Kategori Barang</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('manajer_job/lihat_list_kamar') ?>">
            <i class="fa fa-list" aria-hidden="true"></i>
            <span>List Kamar</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('manajer_job/lihat_list_kategori_kamar') ?>">
            <i class="fa fa-list" aria-hidden="true"></i>
            <span>List Kategori Kamar</span></a>
    </li>
</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- ambil nama dari data base -->
                        <span class="mr-2 d-none d-lg-inline text-gray-600"><?= $employee['name_employee'] ?></span>
                        <!-- ambil gambar dari data base -->
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $employee['image']  ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            My Profile
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" href="<?= base_url('auth/logout') ?>">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.css">
        </head>

        <body>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahkategori">Tambah Data</button>
                        <h1 class="h3 mb-4 text-gray-800">List kategori barang</h1>
                        <hr>
                        <table class="table table-striped" align="center" id="datakategori">
                            <thead align="center">
                                <tr>
                                    <th>ID kategori</th>
                                    <th>Nama kategori barang</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
        </body>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.all.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


        <!-- End of Main Content -->