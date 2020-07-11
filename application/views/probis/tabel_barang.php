        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Data total barang pada storage</h1>

            <?php?>
            <table class="table table-striped" id="tabel-data">
                <thead align="center">
                    <tr>
                        <th>ID barang</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($hasil as $item) {
                    ?>
                        <tr align="center">
                            <td><?php echo $item->id_barang; ?></td>
                            <td><?php echo $item->nama_barang; ?></td>
                            <td><?php echo $item->stok; ?></td>
                            <td><?php echo $item->name_kategori; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

                <script>
                    $(document).ready(function() {
                        $('#tabel-data').DataTable();
                    });
                </script>

            </table>
            <br>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->