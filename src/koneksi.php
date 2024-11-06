<?php 
    $koneksi= mysqli_connect ("localhost", "root","", "db_spp_putri");

    // cek connestion
    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }
?>