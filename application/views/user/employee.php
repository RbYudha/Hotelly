<style>
    #link {
        color: #FFFFFF;
    }
</style>

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

<!-- <script>
    if (b111 > 100 && b112 > 100 && b113 > 100 && b211 > 100 && b212 > 100 && b213 > 100 && b214 > 100 &&
        b311 > 100 && b312 > 100 && b411 > 100 && b412 > 100 && b511 > 100) {
        Swal.fire({
            type: 'info',
            title: 'Stok barang dalam keadaan stabil',
            text: 'tidak perlu stok ulang',
        });
    } else {

        Swal.fire({
            type: 'warning',
            title: 'Perhatian',
            text: 'Mohon segera cek "Perintah Re-stok"',
            confirmButtonText: '<a id="link" href = "<?= base_url('manajer_job/order_stok') ?>">Cek</a>',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            cancelButtonText: 'Later'
        });
    }
</script> -->

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
                title: 'Mohon segera stok ulang \n <?= $barang1['nama_barang'] ?>',
                text: 'Total <?= $barang1['nama_barang'] ?> pada storage : <?= $barang1['stok'] ?>',
                confirmButtonText: '<a id="link" href = "<?= base_url('employee/stoking_barang') ?>">Restok</a>',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: 'Later'
            });
        }

        if (b112 < 100) {
            Swal.fire({
                type: 'warning',
                title: 'Mohon segera stok ulang \n <?= $barang2['nama_barang'] ?>',
                text: 'Total <?= $barang2['nama_barang'] ?> pada storage : <?= $barang2['stok'] ?>',
                confirmButtonText: '<a id="link" href = "<?= base_url('employee/stoking_barang') ?>">Restok</a>',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: 'Later'
            });
        }

        if (b113 < 100) {
            Swal.fire({
                type: 'warning',
                title: 'Mohon segera stok ulang \n <?= $barang3['nama_barang'] ?>',
                text: 'Total <?= $barang3['nama_barang'] ?> pada storage : <?= $barang3['stok'] ?>',
                confirmButtonText: '<a id="link" href = "<?= base_url('employee/stoking_barang') ?>">Restok</a>',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: 'Later'
            });
        }

        if (b211 < 100) {
            Swal.fire({
                type: 'warning',
                title: 'Mohon segera stok ulang \n <?= $barang4['nama_barang'] ?>',
                text: 'Total <?= $barang4['nama_barang'] ?> pada storage : <?= $barang4['stok'] ?>',
                confirmButtonText: '<a id="link" href = "<?= base_url('employee/stoking_barang') ?>">Restok</a>',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: 'Later'

            });
        }

        if (b212 < 100) {
            Swal.fire({
                type: 'warning',
                title: 'Mohon segera stok ulang \n <?= $barang5['nama_barang'] ?>',
                text: 'Total <?= $barang5['nama_barang'] ?> pada storage : <?= $barang5['stok'] ?>',
                confirmButtonText: '<a id="link" href = "<?= base_url('employee/stoking_barang') ?>">Restok</a>',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: 'Later'

            });
        }

        if (b213 < 100) {
            Swal.fire({
                type: 'warning',
                title: 'Mohon segera stok ulang \n <?= $barang6['nama_barang'] ?>',
                text: 'Total <?= $barang6['nama_barang'] ?> pada storage : <?= $barang6['stok'] ?>',
                confirmButtonText: '<a id="link" href = "<?= base_url('employee/stoking_barang') ?>">Restok</a>',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: 'Later'

            });
        }

        if (b214 < 100) {
            Swal.fire({
                type: 'warning',
                title: 'Mohon segera stok ulang \n <?= $barang7['nama_barang'] ?>',
                text: 'Total <?= $barang7['nama_barang'] ?> pada storage : <?= $barang7['stok'] ?>',
                confirmButtonText: '<a id="link" href = "<?= base_url('employee/stoking_barang') ?>">Restok</a>',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: 'Later'

            });
        }

        if (b311 < 100) {
            Swal.fire({
                type: 'warning',
                title: 'Mohon segera stok ulang \n <?= $barang8['nama_barang'] ?>',
                text: 'Total <?= $barang8['nama_barang'] ?> pada storage : <?= $barang8['stok'] ?>',
                confirmButtonText: '<a id="link" href = "<?= base_url('employee/stoking_barang') ?>">Restok</a>',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: 'Later'

            });
        }

        if (b312 < 100) {
            Swal.fire({
                type: 'warning',
                title: 'Mohon segera stok ulang \n <?= $barang9['nama_barang'] ?>',
                text: 'Total <?= $barang9['nama_barang'] ?> pada storage : <?= $barang9['stok'] ?>',
                confirmButtonText: '<a id="link" href = "<?= base_url('employee/stoking_barang') ?>">Restok</a>',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: 'Later'

            });
        }
        if (b411 < 100) {
            Swal.fire({
                type: 'warning',
                title: 'Mohon segera stok ulang \n <?= $barang10['nama_barang'] ?>',
                text: 'Total <?= $barang10['nama_barang'] ?> pada storage : <?= $barang10['stok'] ?>',
                confirmButtonText: '<a id="link" href = "<?= base_url('employee/stoking_barang') ?>">Restok</a>',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: 'Later'

            });
        }
        if (b412 < 100) {
            Swal.fire({
                type: 'warning',
                title: 'Mohon segera stok ulang \n <?= $barang11['nama_barang'] ?>',
                text: 'Total <?= $barang11['nama_barang'] ?> pada storage : <?= $barang11['stok'] ?>',
                confirmButtonText: '<a id="link" href = "<?= base_url('employee/stoking_barang') ?>">Restok</a>',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: 'Later'

            });
        }
        if (b511 < 100) {
            Swal.fire({
                type: 'warning',
                title: 'Mohon segera stok ulang \n <?= $barang12['nama_barang'] ?>',
                text: 'Total <?= $barang12['nama_barang'] ?> pada storage : <?= $barang12['stok'] ?>',
                confirmButtonText: '<a id="link" href = "<?= base_url('employee/stoking_barang') ?>">Restok</a>',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: 'Later'

            });
        }
    }
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Hotel Employee</h1>

    <!-- panggil session -->
    <?= $this->session->flashdata('messageSuc'); ?>

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