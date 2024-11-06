 <?php
    include_once "../src/koneksi.php";

    //Membaca variable kode pada URL (alamat browser)
    if(isset($_GET['id_spp'])){
        $id_spp=$_GET['id_spp'];

        //hapus data sesuai kode yg terbaca
        $sql =mysqli_query($koneksi, "DELETE FROM spp WHERE id_spp='$id_spp'"); 
        if($sql){
            //Refresh halaman
            echo "<center><b><font color= 'red' size='4'><p>Data Berhasil dihapus</p></center></b></font></br>
            <meta htt-equiv='refresh' content='2; url=?open=data_spp'>";
        }
    }
    else{
        //Jika tidak ada data kode ditemukan di URL
        echo "<b>Data yang dihapus tidak ada</b>";
    }
?>