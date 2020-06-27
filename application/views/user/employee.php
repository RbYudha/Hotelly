<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Hotel Employee</h1>

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