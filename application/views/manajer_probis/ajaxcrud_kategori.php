<!-- Modal untuk tambah data kategori -->
<div class="modal fade" id="tambahkategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formtambahdatakategori">
                    <div class="form-group row">
                        <label for="inputnama" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_ktg" placeholder="Nama Kategori">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah Data kategori</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal untuk edit data kategori -->
<div class="modal fade" id="editkategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="formdatakategori">

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // ini adalah fungsi untuk mengambil data kategori dan di  incluce ke dalam datatable
            var datakategori = $('#datakategori').DataTable({
                "processing": true,
                "ajax": "<?= base_url("manajer_job/datakategori") ?>",
                stateSave: true,
                "order": []
            })

            // fungsi untuk menambah data  
            // pilih selector dari yang id formtambahdatakategori  
            $('#formtambahdatakategori').on('submit', function() {
                var nama = $('#nama_ktg').val(); // diambil dari id nama yang ada diform modal

                $.ajax({
                    type: "post",
                    url: "<?= base_url('manajer_job/tambahkategori') ?>",
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
                        nama: nama,

                    },
                    dataType: "JSON",
                    success: function(data) {
                        datakategori.ajax.reload(null, false);
                        swal({
                            type: 'success',
                            title: 'Tambah kategori',
                            text: 'Anda Berhasil Menambah kategori'
                        })
                        // bersihkan form pada modal
                        $('#tambahkategori').modal('hide');
                        // tutup modal
                        $('#nama').val('');
                    }
                })
                return false;
            });
            $('#datakategori').on('click', '.ubah-kategori', function() {
                // ambil element id pada saat klik ubah
                var id = $(this).data('id');

                $.ajax({
                    type: "post",
                    url: "<?= base_url('manajer_job/formedit_kategori') ?>",
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
                        $('#editkategori').modal('show');
                        $('#formdatakategori').html(data);

                        // proses untuk mengubah data
                        $('#formubahdatakategori').on('submit', function() {
                            var editid = $('#editid').val();
                            var editnama = $('#editnama').val();
                            var id = $('#id_kategori').val();

                            $.ajax({
                                type: "post",
                                url: "<?= base_url('manajer_job/ubahkategori') ?>",
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
                                    editid: editid,
                                    editnama: editnama,
                                    id: id
                                }, // ambil datanya dari form yang ada di variabel

                                success: function(data) {
                                    datakategori.ajax.reload(null, false);
                                    swal({
                                        type: 'success',
                                        title: 'Update kategori',
                                        text: 'Anda Berhasil Mengubah Data kategori'
                                    })
                                    // bersihkan form pada modal
                                    $('#editkategori').modal('hide');
                                }
                            })
                            return false;
                        });
                    }
                });
            });
            // fungsi untuk hapus data
            //pilih selector dari table id datakategori dengan class .hapus-kategori
            $('#datakategori').on('click', '.hapus-kategori', function() {
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
                            url: "<?= base_url('manajer_job/hapuskategori') ?>",
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
                                datakategori.ajax.reload(null, false)
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
            //pilih selector dari table id datakategori dengan class .hapus-kategori
            $('#datakategori').on('click', '.hapus-kategori', function() {
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
                            url: "<?= base_url('manajer_job/hapuskategori') ?>",
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
                                datakategori.ajax.reload(null, false)
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