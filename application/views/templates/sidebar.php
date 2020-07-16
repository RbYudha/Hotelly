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

    <!-- Heading -->
    <div class="sidebar-heading">
        Employee
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href=<?= base_url('employee/index') ?>>
            <i class="fas fa-user"></i>
            <span>My Profile</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <!-- pindah ke probis -->
        <a class="nav-link" href="<?= base_url('employee/tambah_barang') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Tambah Barang</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href=<?= base_url('employee/stoking_barang') ?>>
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Stoking Barang</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href=<?= base_url('employee/ambil_barang') ?>>
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Ambil Barang</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href=<?= base_url('employee/lapor_barang') ?>>
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Lapor Barang</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href=<?= base_url('employee/lihat_tabel_barang') ?>>
            <i class="fas fa-fw fa-chart-area"></i>
            <span>List Total Barang</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar)
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

</ul>
<!-- End of Sidebar -->