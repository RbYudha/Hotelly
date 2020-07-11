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

        <!-- get data from DB -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <style>
                #link {
                    color: #FFFFFF;
                }
            </style>

            <!-- Page Heading -->
            <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

            <script>
                var b111 = <?= $barang1['stok'] ?>;
                var b112 = <?= $barang2['stok'] ?>;
                var b113 = <?= $barang3['stok'] ?>;
                var b211 = <?= $barang4['stok'] ?>;
                var b212 = <?= $barang5['stok'] ?>;
                var b213 = <?= $barang6['stok'] ?>;
                var b214 = <?= $barang7['stok'] ?>;
                var b311 = <?= $barang8['stok'] ?>;
                var b312 = <?= $barang9['stok'] ?>;
                var b411 = <?= $barang10['stok'] ?>;
                var b412 = <?= $barang11['stok'] ?>;
                var b511 = <?= $barang12['stok'] ?>;
            </script>

            <script>
                if (b111 > 100 && b112 > 100 && b113 > 100 && b211 > 100 && b212 > 100 && b213 > 100 && b214 > 100 &&
                    b311 > 100 && b312 > 100 && b411 > 100 && b412 > 100 && b511 > 100) {
                    Swal.fire({
                        type: 'info',
                        title: 'Stok barang dalam keadaan stabil',
                        text: 'tidak perlu stok ulang',
                    });
                } else {

                    if (b111 < 100) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Mohon segera stok ulang <?= $barang1['nama_barang'] ?>',
                            text: 'Total <?= $barang1['nama_barang'] ?> : <?= $barang1['stok'] ?>',
                            confirmButtonText: '<a id="link" href = "<?= base_url('manajer_job/order_stok') ?>">Restok</a>',
                            showCancelButton: true,
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Later'
                        });
                    }

                    if (b112 < 100) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Mohon segera stok ulang <?= $barang2['nama_barang'] ?>',
                            text: 'Total <?= $barang2['nama_barang'] ?> : <?= $barang2['stok'] ?>',
                            confirmButtonText: '<a id="link" href = "<?= base_url('manajer_job/order_stok') ?>">Restok</a>',
                            showCancelButton: true,
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Later'
                        });
                    }

                    if (b113 < 100) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Mohon segera stok ulang <?= $barang3['nama_barang'] ?>',
                            text: 'Total <?= $barang3['nama_barang'] ?> : <?= $barang3['stok'] ?>',
                            confirmButtonText: '<a id="link" href = "<?= base_url('manajer_job/order_stok') ?>">Restok</a>',
                            showCancelButton: true,
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Later'
                        });
                    }

                    if (b211 < 100) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Mohon segera stok ulang <?= $barang4['nama_barang'] ?>',
                            text: 'Total <?= $barang4['nama_barang'] ?> : <?= $barang4['stok'] ?>',
                            confirmButtonText: '<a id="link" href = "<?= base_url('manajer_job/order_stok') ?>">Restok</a>',
                            showCancelButton: true,
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Later'

                        });
                    }

                    if (b212 < 100) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Mohon segera stok ulang <?= $barang5['nama_barang'] ?>',
                            text: 'Total <?= $barang5['nama_barang'] ?> : <?= $barang5['stok'] ?>',
                            confirmButtonText: '<a id="link" href = "<?= base_url('manajer_job/order_stok') ?>">Restok</a>',
                            showCancelButton: true,
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Later'

                        });
                    }

                    if (b213 < 100) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Mohon segera stok ulang <?= $barang6['nama_barang'] ?>',
                            text: 'Total <?= $barang6['nama_barang'] ?> : <?= $barang6['stok'] ?>',
                            confirmButtonText: '<a id="link" href = "<?= base_url('manajer_job/order_stok') ?>">Restok</a>',
                            showCancelButton: true,
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Later'

                        });
                    }

                    if (b214 < 100) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Mohon segera stok ulang <?= $barang7['nama_barang'] ?>',
                            text: 'Total <?= $barang7['nama_barang'] ?> : <?= $barang7['stok'] ?>',
                            confirmButtonText: '<a id="link" href = "<?= base_url('manajer_job/order_stok') ?>">Restok</a>',
                            showCancelButton: true,
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Later'

                        });
                    }

                    if (b311 < 100) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Mohon segera stok ulang <?= $barang8['nama_barang'] ?>',
                            text: 'Total <?= $barang8['nama_barang'] ?> : <?= $barang8['stok'] ?>',
                            confirmButtonText: '<a id="link" href = "<?= base_url('manajer_job/order_stok') ?>">Restok</a>',
                            showCancelButton: true,
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Later'

                        });
                    }

                    if (b312 < 100) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Mohon segera stok ulang <?= $barang9['nama_barang'] ?>',
                            text: 'Total <?= $barang9['nama_barang'] ?> : <?= $barang9['stok'] ?>',
                            confirmButtonText: '<a id="link" href = "<?= base_url('manajer_job/order_stok') ?>">Restok</a>',
                            showCancelButton: true,
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Later'

                        });
                    }

                    if (b411 < 100) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Mohon segera stok ulang <?= $barang10['nama_barang'] ?>',
                            text: 'Total <?= $barang10['nama_barang'] ?> : <?= $barang10['stok'] ?>',
                            confirmButtonText: '<a id="link" href = "<?= base_url('manajer_job/order_stok') ?>">Restok</a>',
                            showCancelButton: true,
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Later'

                        });
                    }

                    if (b412 < 100) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Mohon segera stok ulang <?= $barang11['nama_barang'] ?>',
                            text: 'Total <?= $barang11['nama_barang'] ?> : <?= $barang11['stok'] ?>',
                            confirmButtonText: '<a id="link" href = "<?= base_url('manajer_job/order_stok') ?>">Restok</a>',
                            showCancelButton: true,
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Later'

                        });
                    }

                    if (b511 < 100) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Mohon segera stok ulang <?= $barang12['nama_barang'] ?>',
                            text: 'Total <?= $barang12['nama_barang'] ?> : <?= $barang12['stok'] ?>',
                            confirmButtonText: '<a id="link" href = "<?= base_url('manajer_job/order_stok') ?>">Restok</a>',
                            showCancelButton: true,
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Later'

                        });
                    }


                }
            </script>


            <h1 class="h3 mb-4 text-gray-800">Hotel Manajer</h1>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $employee['image']  ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">My profile</h5>
                            <p class="card-text">Name : <?= $employee['name_employee']  ?></p>
                            <p class="card-text">Email : <?= $employee['email_employee']  ?></p>
                            <p class="card-text">Worked since : <?= $employee['date_created'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->