<?php 

    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "database_toko");

    $connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if(!$connection) {
        die("Koneksi Gagal");
    }
    
?>