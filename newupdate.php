<?php include("header.php"); ?>
<?php include("dbconnect.php"); ?>

<?php 

if (isset($_GET['id'])) {
    
    $id_barang = $_GET['id'];

    $query = "select * from `inventory` where `id` = '$id_barang'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die ("Query Gagal".mysqli_error());
    } else {
        $row = mysqli_fetch_assoc($result);

    }
}

?>

<?php 

if (isset($_POST['edit_barang'])) {

    if (isset($_GET['id_new'])) {
        $id_new = $_GET['id_new'];
    }

    $id_barang = $_POST['id'];
    $n_barang = $_POST['n_barang'];
    $j_barang = $_POST['j_barang'];
    $m_barang = $_POST['m_barang'];
    $u_barang = $_POST['u_barang'];
    $s_barang = $_POST['s_barang'];
    $sa_barang = $_POST['sa_barang'];
    $l_barang = $_POST['l_barang'];

    $query = "update `inventory` set 
    `id` = '$id_barang', 
    `nama_barang` = '$n_barang', 
    `jenis` = '$j_barang', 
    `merk` = '$m_barang', 
    `ukuran` = '$u_barang', 
    `stock` = '$s_barang', 
    `satuan` = '$sa_barang', 
    `lokasi` = '$l_barang' 
    where `id` = '$id_new'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die ("Query Gagal".mysqli_error());
    } else {
        header('location:index.php?update_msg=Berhasil disimpan.');
    }

}

?>

<form action="newupdate.php?id_new=<?php echo $id_barang; ?>" method="post">
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" name="id" class="form-control" value="<?php echo $row['id'] ?>">
    </div>
    <div class="form-group">
        <label for="n_barang">Nama Barang</label>
        <input type="text" name="n_barang" class="form-control" value="<?php echo $row['nama_barang'] ?>">
    </div>
    <div class="form-group">
        <label for="j_barang">Jenis</label>
        <input type="text" name="j_barang" class="form-control" value="<?php echo $row['jenis'] ?>">
    </div>
    <div class="form-group">
        <label for="m_barang">Merk</label>
        <input type="text" name="m_barang" class="form-control" value="<?php echo $row['merk'] ?>">
    </div>
    <div class="form-group">
        <label for="u_barang">Ukuran</label>
        <input type="text" name="u_barang" class="form-control" value="<?php echo $row['ukuran'] ?>">
    </div>
    <div class="form-group">
        <label for="s_barang">Stock</label>
        <input type="text" name="s_barang" class="form-control" value="<?php echo $row['stock'] ?>">
    </div>
    <div class="form-group">
        <label for="sa_barang">Satuan</label>
        <input type="text" name="sa_barang" class="form-control" value="<?php echo $row['satuan'] ?>">
    </div>
    <div class="form-group">
        <label for="l_barang">Lokasi</label>
        <input type="text" name="l_barang" class="form-control" value="<?php echo $row['lokasi'] ?>">
    </div>
    <input type="submit" class="btn btn-success" name="edit_barang" value="Edit">
</form>

<?php include("footer.php"); ?>