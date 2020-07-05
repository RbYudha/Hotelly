<form id="formubahdatakategori" method="post">
    <div class="form-group row">
        <label for="inputid" class="col-sm-2 col-form-label">ID</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="editid" value="<?= $dataperkategori['id_kategori'] ?>" placeholder="edit alamat email" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="editnama" value="<?= $dataperkategori['name_kategori'] ?>" placeholder="edit nama kategori" required>
            <input type="hidden" name="id" id="id_kategori" value="<?= $dataperkategori['id_kategori'] ?>">
        </div>
    </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Ubah Data kategori</button>
    </div>
</form>