<form id="formubahdatakategori_kamar" method="post">
    <div class="form-group row">
        <label for="inputnama" class="col-sm-2 col-form-label">ID</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="editid" value="<?= $dataperkategori_kamar['id_kategori_kmr'] ?>" placeholder="Edit id kategori kamar" required>
            <input type="hidden" name="id" id="id_kategori_kamar" value="<?= $dataperkategori_kamar['id_kategori_kmr'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputemail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="editnama_kategori" value="<?= $dataperkategori_kamar['nama_kategori_kmr'] ?>" placeholder="Edit nama kategori kamar" required>
        </div>
    </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Ubah Data kategori_kamar</button>
    </div>
</form>