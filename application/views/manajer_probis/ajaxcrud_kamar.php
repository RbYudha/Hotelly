<!-- Modal untuk tambah data kamar -->
<div class="modal fade" id="tambahkamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formtambahdatakamar">
                    <div class="form-group row">
                        <label for="inputnama" class="col-sm-2 col-form-label">No</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor" placeholder="masukan nomor kamar">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputrole" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="kategorikamar">
                                <?php
                                foreach ($datakategori->result() as $kategori) {
                                    echo "<option value=" . $kategori->id_kategori_kmr . ">" . $kategori->id_kategori_kmr . '-' . $kategori->nama_kategori_kmr . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah Data kamar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal untuk edit data kamar -->
<div class="modal fade" id="editkamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="formdatakamar">

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // ini adalah fungsi untuk mengambil data kamar dan di  incluce ke dalam datatable
            var datakamar = $('#datakamar').DataTable({
                "processing": true,
                "ajax": "<?= base_url("manajer_job/datakamar") ?>",
                stateSave: true,
                "order": []
            })

            // fungsi untuk menambah data  
            // pilih selector dari yang id formtambahdatakamar  
            $('#formtambahdatakamar').on('submit', function() {
                var nomor = $('#nomor').val();
                var kategorikamar = $('#kategorikamar').val();

                $.ajax({
                    type: "post",
                    url: "<?= base_url('manajer_job/tambahkamar') ?>",
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
                        nomor: nomor,
                        kategorikamar: kategorikamar
                    }, // ambil datanya dari form yang ada di variabel
                    dataType: "JSON",
                    success: function(data) {
                        datakamar.ajax.reload(null, false);
                        swal({
                            type: 'success',
                            title: 'Tambah kamar',
                            text: 'Anda Berhasil Menambah kamar'
                        })
                        // bersihkan form pada modal
                        $('#tambahkamar').modal('hide');
                        // tutup modal
                        $('#nama').val('');
                        $('#alamat').val('');

                    }
                })
                return false;
            });
            $('#datakamar').on('click', '.ubah-kamar', function() {
                // ambil element id pada saat klik ubah
                var id = $(this).data('id');

                $.ajax({
                    type: "post",
                    url: "<?= base_url('manajer_job/formedit_kamar') ?>",
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
                        $('#editkamar').modal('show');
                        $('#formdatakamar').html(data);

                        // proses untuk mengubah data
                        $('#formubahdatakamar').on('submit', function() {
                            var editno = $('#editno').val();
                            var editkategori = $('#editkategori').val();
                            var id = $('#no_kamar').val();

                            $.ajax({
                                type: "post",
                                url: "<?= base_url('manajer_job/ubahkamar') ?>",
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
                                    editno: editno,
                                    editkategori: editkategori,
                                    id: id
                                }, // ambil datanya dari form yang ada di variabel

                                success: function(data) {
                                    datakamar.ajax.reload(null, false);
                                    swal({
                                        type: 'success',
                                        title: 'Update kamar',
                                        text: 'Anda Berhasil Mengubah Data kamar'
                                    })
                                    // bersihkan form pada modal
                                    $('#editkamar').modal('hide');
                                }
                            })
                            return false;
                        });
                    }
                });
            });
            // fungsi untuk hapus data
            //pilih selector dari table id datakamar dengan class .hapus-kamar
            $('#datakamar').on('click', '.hapus-kamar', function() {
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
                            url: "<?= base_url('manajer_job/hapuskamar') ?>",
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
                                datakamar.ajax.reload(null, false)
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
            // fungsi untuk hapus data
            //pilih selector dari table id datakamar dengan class .hapus-kamar
            $('#datakamar').on('click', '.hapus-kamar', function() {
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
                            url: "<?= base_url('manajer_job/hapuskamar') ?>",
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
                                datakamar.ajax.reload(null, false)
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