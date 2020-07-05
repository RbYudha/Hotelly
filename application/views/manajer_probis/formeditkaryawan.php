<form id="formubahdatakaryawan" method="post">
    <div class="form-group row">
        <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="editnama" value="<?= $dataperkaryawan['name_employee'] ?>" placeholder="edit nama" required>
            <input type="hidden" name="id" id="id_karyawan" value="<?= $dataperkaryawan['id_employee'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputemail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="editemail" value="<?= $dataperkaryawan['email_employee'] ?>" placeholder="edit alamat email" required>
        </div>
    </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Ubah Data karyawan</button>
    </div>
</form>