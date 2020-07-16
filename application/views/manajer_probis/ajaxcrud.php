<!-- Modal untuk tambah data barang -->
<div class="modal fade" id="tambahbarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formtambahdatabarang">
                    <div class="form-group row">
                        <label for="inputID" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="id" id="id" placeholder="ID barang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_barang" placeholder="Nama barang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputharga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga_barang" placeholder="Harga barang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputjumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stok" placeholder="Jumlah barang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputjumlah" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_kategori" placeholder="ID kategori">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah Data Barang</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal untuk edit data barang -->
<div class="modal fade" id="editbarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="formdatabarang">

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var databarang = $('#databarang').DataTable({
                "processing": true,
                "ajax": "<?= base_url("index.php/manajer/databarang") ?>",
                stateSave: true,
                "order": []
            })


            // fungsi untuk menambah data  
            // pilih selector dari yang id formtambahdatabarang
            $('#formtambahdatabarang').on('submit', function() {

                var id = $('#id').val();
                var nama_barang = $('#nama_barang').val();
                var harga_barang = $('#harga_barang').val();
                var stok = $('#stok').val();
                var id_kategori = $('#id_kategori').val();

                $.ajax({
                    type: "post",
                    url: "<?= base_url('manajer/tambahbarang') ?>",
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
                        id: id,
                        nama_barang: nama_barang,
                        harga_barang: harga_barang,
                        stok: stok,
                        id_kategori: id_kategori
                    }, // ambil datanya dari form yang ada di variabel
                    dataType: "JSON",
                    success: function(data) {
                        databarang.ajax.reload(null, false);
                        swal({
                            type: 'success',
                            title: 'Tambah Barang',
                            text: 'Anda Berhasil Menambah Barang'
                        })
                        // bersihkan form pada modal
                        $('#tambahbarang').modal('hide');
                        // tutup modal
                        $('#id').val('');
                        $('#nama_barang').val('');
                        $('#harga_barang').val('');
                        $('#stok').val('');
                        $('#id_kategori').val('');
                    }
                })
                return false;
            });
            // fungsi untuk edit data
            //pilih selector dari table id datamahasiswa dengan class .ubah-mahasiswa
            $('#databarang').on('click', '.ubah-barang', function() {
                // ambil element data-id pada saat klik ubah
                var id = $(this).data('id');

                $.ajax({
                    type: "post",
                    url: "<?= base_url('manajer/formedit') ?>",
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
                        $('#editbarang').modal('show');
                        $('#formdatabarang').html(data);

                        // proses untuk mengubah data
                        $('#formubahdatabarang').on('submit', function() {
                            var editid = $('#editid').val(); //diambil dari id yang ada di form modal
                            var editnama = $('#editnama').val(); // diambil dari id nama yang ada diform modal
                            var editharga = $('#editharga').val(); // diambil dari id harga yanag ada di form modal
                            var editstok = $('#editstok').val();
                            var editidkategori = $('#editidkategori').val();
                            var id = $('#idbarang').val();

                            $.ajax({
                                type: "post",
                                url: "<?= base_url('manajer/ubahbarang') ?>",
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
                                    editharga: editharga,
                                    editstok: editstok,
                                    editidkategori: editidkategori,
                                    id: id,

                                }, // ambil datanya dari form yang ada di variabel

                                success: function(data) {
                                    databarang.ajax.reload(null, false);
                                    swal({
                                        type: 'success',
                                        title: 'Update Barang',
                                        text: 'Anda Berhasil Mengubah Data Barang'
                                    })
                                    // bersihkan form pada modal
                                    $('#editbarang').modal('hide');
                                }
                            })
                            return false;
                        });
                    }
                });
            });
            // fungsi untuk hapus data
            //pilih selector dari table id datamahasiswa dengan class .hapus-mahasiswa
            $('#databarang').on('click', '.hapus-barang', function() {
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
                            url: "<?= base_url('manajer/hapusbarang') ?>",
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
                                databarang.ajax.reload(null, false)
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