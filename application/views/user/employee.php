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


<script>
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