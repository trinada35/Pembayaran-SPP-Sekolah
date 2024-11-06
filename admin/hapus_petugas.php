<?php
    include_once "../src/koneksi.php";

    //Membaca variable kode pada URL (alamat browser)
    if(isset($_GET['id_petugas'])){
        $id_petugas=$_GET['id_petugas'];

        //hapus data sesuai kode yg terbaca
        $sql =mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas='$id_petugas'"); 
        if($sql){
            //Refresh halaman
            echo "<center><b><font color= 'red' size='4'><p>Data Berhasil dihapus</p></center></b></font></br>
            <meta htt-equiv='refresh' content='2; url=?open=data_petugas'>";
        }
    }
    else{
        //Jika tidak ada data kode ditemukan di URL
        echo "<b>Data yang dihapus tidak ada</b>";
    }
?>