<!-- Modal untuk tambah data kategori_kamar -->
<div class="modal fade" id="tambahkategori_kamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah kategori_kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formtambahdatakategori_kamar">
                    <div class="form-group row">
                        <label for="inputnama" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="idkamar" placeholder="ID kategori Kamar">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="namakategori" placeholder="Nama kategori kamar">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah Data kategori kamar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal untuk edit data kategori_kamar -->
<div class="modal fade" id="editkategori_kamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data kategori_kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="formdatakategori_kamar">

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // ini adalah fungsi untuk mengambil data kategori_kamar dan di  incluce ke dalam datatable
            var datakategori_kamar = $('#datakategori_kamar').DataTable({
                "processing": true,
                "ajax": "<?= base_url("manajer_job/datakategori_kamar") ?>",
                stateSave: true,
                "order": []
            })

            // fungsi untuk menambah data  
            // pilih selector dari yang id formtambahdatakategori_kamar  
            $('#formtambahdatakategori_kamar').on('submit', function() {
                var idkamar = $('#idkamar').val(); // diambil dari id nama yang ada diform modal
                var namakategori = $('#namakategori').val(); // diambil dari id alamat yanag ada di form modal 

                $.ajax({
                    type: "post",
                    url: "<?= base_url('manajer_job/tambahkategori_kamar') ?>",
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
                        idkamar: idkamar,
                        namakategori: namakategori
                    }, // ambil datanya dari form yang ada di variabel
                    dataType: "JSON",
                    success: function(data) {
                        datakategori_kamar.ajax.reload(null, false);
                        swal({
                            type: 'success',
                            title: 'Tambah kategori_kamar',
                            text: 'Anda Berhasil Menambah kategori_kamar'
                        })
                        // bersihkan form pada modal
                        $('#tambahkategori_kamar').modal('hide');
                        // tutup modal
                        $('#nama').val('');
                        $('#alamat').val('');

                    }
                })
                return false;
            });
            $('#datakategori_kamar').on('click', '.ubah-kategori_kamar', function() {
                // ambil element id pada saat klik ubah
                var id = $(this).data('id');

                $.ajax({
                    type: "post",
                    url: "<?= base_url('manajer_job/formeditkategori_kamar') ?>",
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
                        $('#editkategori_kamar').modal('show');
                        $('#formdatakategori_kamar').html(data);

                        // proses untuk mengubah data
                        $('#formubahdatakategori_kamar').on('submit', function() {
                            var editid = $('#editid').val();
                            var editnama_kategori = $('#editnama_kategori').val();
                            var id = $('#id_kategori_kamar').val();

                            $.ajax({
                                type: "post",
                                url: "<?= base_url('manajer_job/ubahkategori_kamar') ?>",
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
                                    editnama_kategori: editnama_kategori,
                                    id: id,

                                }, // ambil datanya dari form yang ada di variabel

                                success: function(data) {
                                    datakategori_kamar.ajax.reload(null, false);
                                    swal({
                                        type: 'success',
                                        title: 'Update kategori_kamar',
                                        text: 'Anda Berhasil Mengubah Data kategori_kamar'
                                    })
                                    // bersihkan form pada modal
                                    $('#editkategori_kamar').modal('hide');
                                }
                            })
                            return false;
                        });
                    }
                });
            });
            // fungsi untuk hapus data
            //pilih selector dari table id datamahasiswa dengan class .hapus-mahasiswa
            $('#datakategori_kamar').on('click', '.hapus-kategori_kamar', function() {
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
                            url: "<?= base_url('manajer_job/hapuskategori_kamar') ?>",
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
                                datakategori_kamar.ajax.reload(null, false)
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