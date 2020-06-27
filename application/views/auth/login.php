<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block hotel1"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h3 text-gray-900 mb-4">Welcome</h1>
                                    <h2 class="h3 text-gray-900 mb-4">to Hotelly</h2>
                                </div>
                                <hr>
                                <hr>

                                <!-- form login -->
                                <form class="user" method="post" action="<?= base_url('auth/index'); ?>">

                                    <?= $this->session->flashdata('messageSuc'); ?>

                                    <div class="col-xs-3">
                                        <!-- email -->
                                        <input type="text" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" value="<?= set_value('email') ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>

                                    <div class="form-group">
                                        <!-- password -->
                                        <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" ?>
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>