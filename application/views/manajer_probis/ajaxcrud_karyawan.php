<!-- Modal untuk tambah data karyawan -->
<div class="modal fade" id="tambahkaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formtambahdatakaryawan">
                    <div class="form-group row">
                        <label for="inputID" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_karyawan" placeholder="Nama karyawan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputnama" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat_email" placeholder="Alamat email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputpass" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pass_karyawan" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputrole" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="role_karyawan">
                                <?php
                                foreach ($datakategori->result() as $kategori) {
                                    echo "<option value=" . $kategori->id_role . ">" . $kategori->id_role . '-' . $kategori->name_role . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="inputrole" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="role_karyawan" placeholder="Role karyawan">
                        </div>
                    </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah Data karyawan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal untuk edit data karyawan -->
<div class="modal fade" id="editkaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="formdatakaryawan">

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // ini adalah fungsi untuk mengambil data karyawan dan di  incluce ke dalam datatable
            var datakaryawan = $('#datakaryawan').DataTable({
                "processing": true,
                "ajax": "<?= base_url("manajer_job/datakaryawan") ?>",
                stateSave: true,
                "order": []
            })

            // fungsi untuk menambah data  
            // pilih selector dari yang id formtambahdatakaryawan  
            $('#formtambahdatakaryawan').on('submit', function() {

                var nama_karyawan = $('#nama_karyawan').val();
                var alamat_email = $('#alamat_email').val();
                var pass_karyawan = $('#pass_karyawan').val();
                var role_karyawan = $('#role_karyawan').val();

                $.ajax({
                    type: "post",
                    url: "<?= base_url('manajer_job/tambahkaryawan') ?>",
                    beforeSend: function() {
                        swal({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                    },
                    data: {
                        nama_karyawan: nama_karyawan,
                        alamat_email: alamat_email,
                        pass_karyawan: pass_karyawan,
                        role_karyawan: role_karyawan
                    }, // ambil datanya dari form yang ada di variabel
                    dataType: "JSON",
                    success: function(data) {
                        datakaryawan.ajax.reload(null, false);
                        swal({
                            type: 'success',
                            title: 'Tambah karyawan',
                            text: 'Anda Berhasil Menambah karyawan'
                        })
                        // bersihkan form pada modal
                        $('#tambahkaryawan').modal('hide');
                        // tutup modal
                        $('#nama_karyawan').val();
                        $('#alamat_email').val();
                        $('#pass_karyawan').val();
                        $('#role_karyawan').val();
                    }
                })
                return false;
            });
            $('#datakaryawan').on('click', '.ubah-karyawan', function() {
                // ambil element id pada saat klik ubah
                var id = $(this).data('id');

                $.ajax({
                    type: "post",
                    url: "<?= base_url('manajer_job/formedit_karyawan') ?>",
                    beforeSend: function() {
                        swal({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                    },
                    data: {
                        id: id
                    },
                    success: function(data) {
                        swal.close();
                        $('#editkaryawan').modal('show');
                        $('#formdatakaryawan').html(data);

                        // proses untuk mengubah data
                        $('#formubahdatakaryawan').on('submit', function() {
                            var editnama = $('#editnama').val();
                            var editemail = $('#editemail').val();
                            var id = $('#id_karyawan').val();

                            $.ajax({
                                type: "post",
                                url: "<?= base_url('manajer_job/ubahkaryawan') ?>",
                                beforeSend: function() {
                                    swal({
                                        title: 'Menunggu',
                                        html: 'Memproses data',
                                        onOpen: () => {
                                            swal.showLoading()
                                        }
                                    })
                                },
                                data: {
                                    editnama: editnama,
                                    editemail: editemail,
                                    id: id,

                                }, // ambil datanya dari form yang ada di variabel

                                success: function(data) {
                                    datakaryawan.ajax.reload(null, false);
                                    swal({
                                        type: 'success',
                                        title: 'Update karyawan',
                                        text: 'Anda Berhasil Mengubah Data karyawan'
                                    })
                                    // bersihkan form pada modal
                                    $('#editkaryawan').modal('hide');
                                }
                            })
                            return false;
                        });
                    }
                });
            });
            // fungsi untuk hapus data
            //pilih selector dari table id datamahasiswa dengan class .hapus-mahasiswa
            $('#datakaryawan').on('click', '.hapus-karyawan', function() {
                var id = $(this).data('id');
                swal({
                    title: 'Konfirmasi',
                    text: "Anda ingin menghapus ",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: 'Tidak',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "<?= base_url('manajer_job/hapuskaryawan') ?>",
                            method: "post",
                            beforeSend: function() {
                                swal({
                                    title: 'Menunggu',
                                    html: 'Memproses data',
                                    onOpen: () => {
                                        swal.showLoading()
                                    }
                                })
                            },
                            data: {
                                id: id
                            },
                            success: function(data) {
                                swal(
                                    'Hapus',
                                    'Berhasil Terhapus',
                                    'success'
                                )
                                datakaryawan.ajax.reload(null, false)
                            }
                        })
                    } else if (result.dismiss === swal.DismissReason.cancel) {
                        swal(
                            'Batal',
                            'Anda membatalkan penghapusan',
                            'error'
                        )
                    }
                })
            });

        });
    </script>