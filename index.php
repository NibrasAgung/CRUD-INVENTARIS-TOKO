<?php include("header.php"); ?>
<?php include("dbconnect.php"); ?>

        <div class="box1">
            <h2>DAFTAR BARANG</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">TAMBAH BARANG</button>
        </div>

        <table class="table table-striped table-hover table-bordered align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Jenis</th>
                <th>Merk</th>
                <th>Ukuran</th>
                <th>Stock</th>
                <th>Satuan</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "select * from `inventory`";
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die ("Query Gagal".mysqli_error($connection));
                } else {
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <tr>
                            <td> <?php echo $row['id'] ?> </td>
                            <td> <?php echo $row['nama_barang'] ?> </td>
                            <td> <?php echo $row['jenis'] ?> </td>
                            <td> <?php echo $row['merk'] ?> </td>
                            <td> <?php echo $row['ukuran'] ?> </td>
                            <td> <?php echo $row['stock'] ?> </td>
                            <td> <?php echo $row['satuan'] ?> </td>
                            <td> <?php echo $row['lokasi'] ?> </td>
                        </tr>

                        <?php
                    }
                }

            ?>

        </tbody>
    </table>
    
    <?php 

    if (isset($_GET['message'])) {
        echo "<h6 class='text-center text-danger mt-3'>".$_GET['message']."</h6>";
    } else {
        $query = "insert into 'inventaris' ('id', 'nama_barang', 'jenis', 'merk', 'ukuran', 'stock', 'satuan', 'lokasi')
        values ('$id_barang', '$n_barang', '$j_barang', '$m_barang', '$u_barang', '$s_barang', '$sa_barang', '$l_barang')";

        $result = mysqli_query($query);

        if (!$result) {
            die ("Gagal Menyimpan".mysqli_error());
        } else {
            header('location:index.php?insert_msg=Barang telah disimpan');
        }
    }

    ?>


    <!-- Tambah Barang -->

    <form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                        <div class="form-group">
                            <label for="id_barang">ID</label>
                            <input type="text" name="id_barang" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="n_barang">Nama Barang</label>
                            <input type="text" name="n_barang" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="j_barang">Jenis</label>
                            <input type="text" name="j_barang" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="m_barang">Merk</label>
                            <input type="text" name="m_barang" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="u_barang">Ukuran</label>
                            <input type="text" name="u_barang" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="s_barang">Stock</label>
                            <input type="text" name="s_barang" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sa_barang">Satuan</label>
                            <input type="text" name="sa_barang" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="l_barang">Lokasi</label>
                            <input type="text" name="l_barang" class="form-control">
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-success" name="tambah_barang" value="Simpan">
                </div>
             </div>
        </div>
    </div>
    </form>

<?php include("footer.php"); ?>