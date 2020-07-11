<!-- Modal untuk tambah data orderstok -->
<div class="modal fade" id="tambahorderstok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah orderstok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formtambahdataorderstok">
                    <div class="form-group row">
                        <label for="pegawai" class="col-sm-2 col-form-label">Karyawan</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" id="id1" placeholder="id karyawan"> -->
                            <select class="form-control" id="id1">
                                <?php
                                foreach ($datakaryawan->result() as $karyawan) {
                                    echo "<option value=" . $karyawan->id_employee . ">" . $karyawan->id_employee . '-' . $karyawan->name_employee . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="barang" class="col-sm-2 col-form-label">barang</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" id="id2" placeholder="id barang"> -->
                            <select class="form-control" id="id2">
                                <?php
                                foreach ($databarang->result() as $barang) {
                                    echo "<option value=" . $barang->id_barang . ">" . $barang->id_barang . '-' . $barang->nama_barang . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputjumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jumlahorder" placeholder="jumlah order">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputdate" class="col-sm-2 col-form-label">Date order</label>
                        <div class="col-sm-10">
                            <?php
                            $tDate = date('y-m-d');
                            ?>
                            <input type="text" class="form-control" id="date" placeholder="Tanggal order stok" value="<?= $tDate ?>">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah Data orderstok</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal untuk edit data orderstok -->
<div class="modal fade" id="editorderstok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data orderstok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="formdataorderstok">

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // ini adalah fungsi untuk mengambil data orderstok dan di  incluce ke dalam datatable
            var dataorderstok = $('#dataorderstok').DataTable({
                "processing": true,
                "ajax": "<?= base_url("manajer_job/dataorderstok") ?>",
                stateSave: true,
                "order": []
            })


            // fungsi untuk menambah data  
            // pilih selector dari yang id formtambahdataorderstok
            $('#formtambahdataorderstok').on('submit', function() {
                var idpegawai = $('#id1').val();
                var idbarang = $('#id2').val();
                var jumlahorder = $('#jumlahorder').val();
                var date = $('#date').val();

                $.ajax({
                    type: "post",
                    url: "<?= base_url('manajer_job/tambahorderstok') ?>",
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
                        //nama_orderstok: nama_orderstok,
                        idpegawai: idpegawai,
                        idbarang: idbarang,
                        jumlahorder: jumlahorder,
                        date: date
                    }, // ambil datanya dari form yang ada di variabel
                    dataType: "JSON",
                    success: function(data) {
                        dataorderstok.ajax.reload(null, false);
                        swal({
                            type: 'success',
                            title: 'Tambah orderstok',
                            text: 'Anda Berhasil Menambah orderstok'
                        })
                        // bersihkan form pada modal
                        $('#tambahorderstok').modal('hide');
                        // tutup modal
                        $('#idpegawai').val('');
                        $('#idbarang').val('');
                        $('#jumlahorder').val('');
                        $('#date').val('');
                        //$('#nama_orderstok').val('');
                    }
                })
                return false;
            });


            $('#dataorderstok').on('click', '.ubah-orderstok', function() {
                // ambil element id pada saat klik ubah
                var id = $(this).data('id');

                $.ajax({
                    type: "post",
                    url: "<?= base_url('manajer_job/formedit_orderstok') ?>",
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
                        $('#editorderstok').modal('show');
                        $('#formdataorderstok').html(data);

                        // proses untuk mengubah data
                        $('#formubahdataorderstok').on('submit', function() {
                            var editid1 = $('#edit_id1').val();
                            var editid2 = $('#edit_id2').val();
                            var editjumlah = $('#edit_jumlah').val();
                            var editdate = $('#edit_dateorder').val();
                            var id = $('#idorder').val();

                            $.ajax({
                                type: "post",
                                url: "<?= base_url('manajer_job/ubahorderstok') ?>",
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
                                    editid1: editid1,
                                    editid2: editid2,
                                    editjumlah: editjumlah,
                                    editdate: editdate,
                                    id: id
                                }, // ambil datanya dari form yang ada di variabel

                                success: function(data) {
                                    dataorderstok.ajax.reload(null, false);
                                    swal({
                                        type: 'success',
                                        title: 'Update orderstok',
                                        text: 'Anda Berhasil Mengubah Data orderstok'
                                    })
                                    // bersihkan form pada modal
                                    $('#editorderstok').modal('hide');
                                }
                            })
                            return false;
                        });
                    }
                });
            });

            // fungsi untuk hapus data
            //pilih selector dari table id dataorderstok dengan class .hapus-orderstok
            $('#dataorderstok').on('click', '.hapus-orderstok', function() {
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
                            url: "<?= base_url('manajer_job/hapus_orderstok') ?>",
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
                                dataorderstok.ajax.reload(null, false)
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