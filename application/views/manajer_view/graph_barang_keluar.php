<?php
$this->db->select('*');
$this->db->where('id_barang', '111');
$dataProdukChart = $this->db->get("ambilbarang")->result();
foreach ($dataProdukChart as $k => $v) {
    $arrProd1[] = ['label' => $v->date_ambil,  'y' => $v->jumlah_ambil];
}

$this->db->select('*');
$this->db->where('id_barang', '112');
$dataProdukChart = $this->db->get("ambilbarang")->result();
foreach ($dataProdukChart as $k => $v) {
    $arrProd2[] = ['label' => $v->date_ambil,  'y' => $v->jumlah_ambil];
}

$this->db->select('*');
$this->db->where('id_barang', '113');
$dataProdukChart = $this->db->get("ambilbarang")->result();
foreach ($dataProdukChart as $k => $v) {
    $arrProd3[] = ['label' => $v->date_ambil,  'y' => $v->jumlah_ambil];
}
?>

<?php
$this->db->select('*');
$this->db->where('id_barang', '211');
$dataProdukChart = $this->db->get("ambilbarang")->result();
foreach ($dataProdukChart as $k => $v) {
    $arrProd4[] = ['label' => $v->date_ambil,  'y' => $v->jumlah_ambil];
}

$this->db->select('*');
$this->db->where('id_barang', '212');
$dataProdukChart = $this->db->get("ambilbarang")->result();
foreach ($dataProdukChart as $k => $v) {
    $arrProd5[] = ['label' => $v->date_ambil,  'y' => $v->jumlah_ambil];
}

$this->db->select('*');
$this->db->where('id_barang', '213');
$dataProdukChart = $this->db->get("ambilbarang")->result();
foreach ($dataProdukChart as $k => $v) {
    $arrProd6[] = ['label' => $v->date_ambil,  'y' => $v->jumlah_ambil];
}

$this->db->select('*');
$this->db->where('id_barang', '214');
$dataProdukChart = $this->db->get("ambilbarang")->result();
foreach ($dataProdukChart as $k => $v) {
    $arrProd7[] = ['label' => $v->date_ambil,  'y' => $v->jumlah_ambil];
}
?>

<?php
$this->db->select('*');
$this->db->where('id_barang', '311');
$dataProdukChart = $this->db->get("ambilbarang")->result();
foreach ($dataProdukChart as $k => $v) {
    $arrProd8[] = ['label' => $v->date_ambil,  'y' => $v->jumlah_ambil];
}

$this->db->select('*');
$this->db->where('id_barang', '312');
$dataProdukChart = $this->db->get("ambilbarang")->result();
foreach ($dataProdukChart as $k => $v) {
    $arrProd9[] = ['label' => $v->date_ambil,  'y' => $v->jumlah_ambil];
}
?>

<?php
$this->db->select('*');
$this->db->where('id_barang', '411');
$dataProdukChart = $this->db->get("ambilbarang")->result();
foreach ($dataProdukChart as $k => $v) {
    $arrProd10[] = ['label' => $v->date_ambil,  'y' => $v->jumlah_ambil];
}
$this->db->select('*');
$this->db->where('id_barang', '412');
$dataProdukChart = $this->db->get("ambilbarang")->result();
foreach ($dataProdukChart as $k => $v) {
    $arrProd11[] = ['label' => $v->date_ambil,  'y' => $v->jumlah_ambil];
}
?>

<?php
$this->db->select('*');
$this->db->where('id_barang', '511');
$dataProdukChart = $this->db->get("ambilbarang")->result();
foreach ($dataProdukChart as $k => $v) {
    $arrProd12[] = ['label' => $v->date_ambil,  'y' => $v->jumlah_ambil];
}

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
            <script>
                window.onload = function() {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        theme: "light2",
                        animationEnabled: true,
                        title: {
                            text: "Data pengambilan barang"
                        },
                        axisY: {
                            includeZero: false,
                            title: "Jumlah barang/Pcs",
                            suffix: ""
                        },
                        toolTip: {
                            shared: "true"
                        },
                        legend: {
                            cursor: "pointer",
                            itemclick: toggleDataSeries
                        },
                        data: [{
                                type: "spline",
                                visible: true,
                                showInLegend: true,
                                yValueFormatString: "",
                                name: "Sabun",
                                dataPoints: <?= json_encode($arrProd4, JSON_NUMERIC_CHECK); ?>
                            },

                            {
                                type: "spline",
                                visible: false,
                                showInLegend: true,
                                yValueFormatString: "",
                                name: "Shampoo",
                                dataPoints: <?= json_encode($arrProd5, JSON_NUMERIC_CHECK); ?>
                            },

                            {
                                type: "spline",
                                visible: false,
                                showInLegend: true,
                                yValueFormatString: "",
                                name: "Sikat gigi",
                                dataPoints: <?= json_encode($arrProd6, JSON_NUMERIC_CHECK); ?>
                            },

                            {
                                type: "spline",
                                visible: false,
                                showInLegend: true,
                                yValueFormatString: "",
                                name: "Pasta gigi",
                                dataPoints: <?= json_encode($arrProd7, JSON_NUMERIC_CHECK); ?>
                            },

                            {
                                type: "spline",
                                visible: false,
                                showInLegend: true,
                                yValueFormatString: "",
                                name: "Cocoa bar",
                                dataPoints: <?= json_encode($arrProd8, JSON_NUMERIC_CHECK); ?>
                            },

                            {
                                type: "spline",
                                visible: false,
                                showInLegend: true,
                                yValueFormatString: "",
                                name: "Candy",
                                dataPoints: <?= json_encode($arrProd9, JSON_NUMERIC_CHECK); ?>
                            },

                            {
                                type: "spline",
                                visible: false,
                                showInLegend: true,
                                yValueFormatString: "",
                                name: "Fanta",
                                dataPoints: <?= json_encode($arrProd10, JSON_NUMERIC_CHECK); ?>
                            },

                            {
                                type: "spline",
                                visible: false,
                                showInLegend: true,
                                yValueFormatString: "",
                                name: "Cola",
                                dataPoints: <?= json_encode($arrProd11, JSON_NUMERIC_CHECK); ?>
                            },

                            {
                                type: "spline",
                                visible: false,
                                showInLegend: true,
                                yValueFormatString: "",
                                name: "Kopi bubuk",
                                dataPoints: <?= json_encode($arrProd12, JSON_NUMERIC_CHECK); ?>
                            },

                            {
                                type: "spline",
                                visible: false,
                                showInLegend: true,
                                yValueFormatString: "",
                                name: "Handuk",
                                dataPoints: <?= json_encode($arrProd1, JSON_NUMERIC_CHECK); ?>
                            },

                            {
                                type: "spline",
                                visible: false,
                                showInLegend: true,
                                yValueFormatString: "",
                                name: "Bantal",
                                dataPoints: <?= json_encode($arrProd2, JSON_NUMERIC_CHECK); ?>
                            },

                            {
                                type: "spline",
                                visible: false,
                                showInLegend: true,
                                yValueFormatString: "",
                                name: "Guling",
                                dataPoints: <?= json_encode($arrProd3, JSON_NUMERIC_CHECK); ?>
                            },
                            // {
                            //     type: "spline",
                            //     visible: false,
                            //     showInLegend: true,
                            //     yValueFormatString: "",
                            //     name: "Teh celup",
                            // dataPoints: 
                            // }
                        ]
                    });
                    chart.render();

                    function toggleDataSeries(e) {
                        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                            e.dataSeries.visible = false;
                        } else {
                            e.dataSeries.visible = true;
                        }
                        chart.render();
                    }

                }
            </script>
        </head>

        <body>
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </body>
        <br>
        <div class="container">
            <a href="<?= base_url('manajer/lihat_barang_keluar') ?>" class="btn btn-info" role="button" class="btn btn-primary">Tabel pengambilan barang</a>
        </div>