<head>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd"
            }).val()
        });
    </script>
</head>

<div class="container-fluid">
    <div class="card mb-3" style="max-width: 720px;">
        <div class="card-body">
            <div class="text-center">
                <h1 class="h3 text-gray-900 mb-4">Lapor Barang Hilang</h1>
            </div>
            <!-- form -->
            <form class="user" method="post" action="<?= base_url('employee/lapor_barang1'); ?>">
                <div>
                    <label>Nama employee :</label>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="idemployee" placeholder="" name="idemployee" value="<?= $employee['id_employee'], " - ", $employee['name_employee'];  ?>">
                </div>
                <div>
                    <label for="barang">Pilih barang yang hilang:</label>
                </div>
                <div class="form-group">
                    <select name="barang" id="barang">
                        <?php
                        foreach ($databarang->result() as $barang) {
                            echo "<option value=" . $barang->id_barang . ">" . $barang->id_barang . '-' . $barang->nama_barang . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label for="kamar">Pilih kamar:</label>
                </div>
                <div class="form-group">
                    <select name="kamar" id="kamar">
                        <?php
                        foreach ($datakamar->result() as $kamar) {
                            echo "<option value=" . $kamar->no_kamar . ">" . $kamar->no_kamar .  ' - ' . $kamar->nama_kategori_kmr . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="jumlah_hilang" placeholder="Masukan jumlah barang yang hilang" name="jumlah_hilang">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="datepicker" placeholder="Masukan tanggal" name="datepicker">
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Lapor
                </button>
        </div>
        </form>
    </div>
</div>
</div>