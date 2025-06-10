<?php 
include("dbconnect.php");
if (isset($_POST['tambah_barang'])) {
    
    $id_barang = $_POST['id'];
    $n_barang = $_POST['n_barang'];
    $j_barang = $_POST['j_barang'];
    $m_barang = $_POST['m_barang'];
    $u_barang = $_POST['u_barang'];
    $s_barang = $_POST['s_barang'];
    $sa_barang = $_POST['sa_barang'];
    $l_barang = $_POST['l_barang'];

    if ($n_barang == "" || empty($n_barang)) {
        header ('location:index.php?message=Nama barang diperlukan');
    } else {
        
        $query = "insert into `inventory` (`id`, `nama_barang`, `jenis`, `merk`, `ukuran`, `stock`, `satuan`, `lokasi`)
        values ('$id_barang', '$n_barang', '$j_barang', '$m_barang', '$u_barang', '$s_barang', '$sa_barang', '$l_barang')";

        $result = mysqli_query($connection,$query);

        if (!$result) {
            die ("Gagal Menyimpan".mysqli_error());
        } else {
            header('location:index.php?insert_msg=Barang telah disimpan');
        }

    }
}

?>