<div class="container-fluid">
    <div class="card mb-3" style="max-width: 720px;">
        <div class="card-body">
            <div class="text-center">
                <h1 class="h3 text-gray-900 mb-4">Stok Barang</h1>
            </div>
            <!-- form -->
            <form class="user" method="post" action="<?= base_url('employee/stok_barang1'); ?>">
                <div>
                    <label>Nama employee :</label>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="idemployee" placeholder="" name="idemployee" value="<?= $employee['id_employee'], " - ", $employee['name_employee'];  ?>">
                </div>
                <div>
                    <label for="kategori_barang">Pilih kategori barang :</label>
                </div>
                <div class="form-group">
                    <select name="kategori" id="kategori">
                        <?php
                        foreach ($datakategori->result() as $kategori) {
                            echo "<option value=" . $kategori->id_kategori . ">" . $kategori->id_kategori . '-' . $kategori->name_kategori . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="idbarang" placeholder="Masukan ID Barang" name="idbarang" value="<?= set_value('idbarang') ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="namabarang" placeholder="Masukan Nama Barang" name="namabarang" value="<?= set_value('namabarang') ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="hargabarang" placeholder="Masukan Harga Barang" name="hargabarang" value="<?= set_value('hargabarang') ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="stokbarang" placeholder="Masukan Stok Barang" name="stokbarang" value="<?= set_value('stokbarang') ?>">
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Tambah Barang
                </button>
            </form>
            </>
        </div>
    </div>
</div>