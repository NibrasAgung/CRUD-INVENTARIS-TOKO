<?php include('dbconnect.php'); ?>

<?php 

if (isset($_GET['id'])) {
     $id_barang = $_GET['id'];
}

$query = "delete from `inventory` where `id` = '$id_barang'";

$result = mysqli_query($connection, $query);

if (!$result) {
    die ("Gagal di hapus".mysqli_error());
} else {
    header('location:index.php?delete_msg=Berhasil di hapus');
}

?>