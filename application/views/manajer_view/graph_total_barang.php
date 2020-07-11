<?php
$this->db->select('*');
$dataProdukChart = $this->db->get("barang")->result();
foreach ($dataProdukChart as $k => $v) {
    $arrProd[] = ['label' => $v->nama_barang, 'y' => $v->stok];
}
// print_r(json_encode($arrProd, JSON_NUMERIC_CHECK));die();
?>

</head>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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
        <a class="nav-link" href="<?= base_url('manajer_job/order_stok') ?>">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            <span>List Order</span></a>
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
            <script type="text/javascript">
                window.onload = function() {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        theme: "light2", // "light2", "dark1", "dark2"
                        animationEnabled: false, // change to true
                        title: {
                            text: "Data Total Stok Barang"
                        },
                        data: [{
                            // Change type to "bar", "area", "spline", "pie",etc.
                            //type: "column",
                            type: "column",

                            dataPoints: <?= json_encode($arrProd, JSON_NUMERIC_CHECK); ?>

                        }]
                    });
                    chart.render();

                }
            </script>

        </head>

        <body>
            <div id="chartContainer" style="height: 420px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
        </body>
        <br>
        <div class="container">
            <a href="<?= base_url('manajer/lihat_barang') ?>" class="btn btn-info" role="button" class="btn btn-primary">Tabel total barang</a>
        </div>