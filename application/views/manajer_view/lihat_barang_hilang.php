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
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>My Profile</span></a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('manajer/lihat_barang') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data Total Barang</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('manajer/lihat_barang_masuk') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data Barang Masuk</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('manajer/lihat_barang_keluar') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data Barang Keluar</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('manajer/lihat_barang_hilang') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data Barang Hilang</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar)
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

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
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Data Barang Keluar</h1>

            <?php?>
            <table class="table" id="tabel-data">
                <thead>
                    <tr>
                        <th>ID Hilang</th>
                        <th>Pegawai</th>
                        <th>Nama</th>
                        <th>Kamar</th>
                        <th>Jumlah</th>
                        <th>Tanggal Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($hasil as $item) {
                    ?>
                        <tr>
                            <td><?php echo $item->id_hilang; ?></td>
                            <td><?php echo $item->name_employee; ?></td>
                            <td><?php echo $item->nama_barang; ?></td>
                            <td><?php echo $item->no_kamar; ?></td>
                            <td><?php echo $item->jumlah_hilang; ?></td>
                            <td><?php echo $item->date_hilang; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <script>
                    $(document).ready(function() {
                        $('#tabel-data').DataTable();
                    });
                </script>

            </table>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->