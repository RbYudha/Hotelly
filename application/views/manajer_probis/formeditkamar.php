<form id="formubahdatakamar" method="post">
    <div class="form-group row">
        <label for="inputid" class="col-sm-2 col-form-label">No</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="editno" value="<?= $dataperkamar['no_kamar'] ?>" placeholder="Nomor kamar" required>
            <input type="hidden" name="no" id="no_kamar" value="<?= $dataperkamar['no_kamar'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputrole" class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-10">
            <select class="form-control" id="editkategori">
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
        <button type="submit" class="btn btn-primary">Ubah Data kamar</button>
    </div>
</form>