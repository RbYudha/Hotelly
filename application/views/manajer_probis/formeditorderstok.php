<form id="formubahdataorderstok" method="post">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Karyawan</label>
        <div class="col-sm-10">
            <select class="form-control" id="edit_id1" required>
                <?php
                foreach ($datakaryawan->result() as $karyawan) {
                    echo "<option value=" . $karyawan->id_employee . ">" . $karyawan->id_employee . '-' . $karyawan->name_employee . "</option>";
                }
                ?>
            </select>
            <input type="hidden" id="idorder" value="<?= $dataperorderstok['id_order'] ?>">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Barang</label>
        <div class="col-sm-10">
            <select class="form-control" id="edit_id2" required>
                <?php
                foreach ($databarang->result() as $barang) {
                    echo "<option value=" . $barang->id_barang . ">" . $barang->id_barang . '-' . $barang->nama_barang . "</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jumlah</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="edit_jumlah" value="<?= $dataperorderstok['jumlah_order'] ?>" placeholder="editorder" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Date</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="edit_dateorder" value="<?= $dataperorderstok['date_order'] ?>" placeholder="editdate" required>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Ubah Data</button>
    </div>

</form>