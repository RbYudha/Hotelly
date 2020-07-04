<form id="formubahdatabarang" method="post">
    <div class="form-group row">
        <label for="inputid" class="col-sm-2 col-form-label">ID</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="editid" value="<?= $dataperbarang['id_barang'] ?>" placeholder="editid" required>
            <input type="hidden" name="id" id="idbarang" value="<?= $dataperbarang['id_barang'] ?>">
            <input type="hidden" name="stok" id="stok" value="<?= $dataperbarang['stok'] ?>">
            <input type="hidden" name="idkategori" id="idkategori" value="<?= $dataperbarang['id_kategori'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="editnama" value="<?= $dataperbarang['nama_barang'] ?>" placeholder="editbarang" required>
        </div>
    </div>
    <!-- <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="editharga" value="<?= $dataperbarang['harga_barang'] ?>" placeholder="editharga" required>
        </div>
    </div> -->
    <div class="form-group row">
        <label for="inputstok" class="col-sm-2 col-form-label">Stok</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="editstok" value="<?= $dataperbarang['stok'] ?>" placeholder="editstok" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputkategori" class="col-sm-2 col-form-label">kategori</label>
        <div class="col-sm-10">
            <select class="form-control" id="editidkategori">
                <?php
                foreach ($datakategori->result() as $kategori) {
                    echo "<option value=" . $kategori->id_kategori . ">" . $kategori->id_kategori . '-' . $kategori->name_kategori . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Ubah Data Barang</button>
    </div>
</form>