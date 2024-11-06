<?php 
    include_once "../src/koneksi.php";

    #SKRIP TOMBOL SIMPAN DIKLIK
    if(isset($_POST['btnSimpan'])){
        $id_kelas =$_POST['id_kelas'];
        $nama_kelas =$_POST['nama_kelas'];
        $kompetensi_keahlian =$_POST['kompetensi_keahlian'];

        //validasi form inputs
        $pesanError = array();
        if (trim($id_kelas)==""){
            $pesanError[]= "Data <b>ID KELAS</b> tidak boleh kosong ";
        }
        if (trim($nama_kelas)==""){
            $pesanError[]= "Data <b>NAMA KELAS</b> tidak boleh kosong ";
        }
        if (trim($kompetensi_keahlian)==""){
            $pesanError[]= "Data <b>KOMPETENSI KEAHLIAN</b> tidak boleh kosong ";
        }

        //Menampilkan pesan error dari form
        if (count($pesanError)>=1){
            $noPesan= 0;
            foreach ($pesanError as $indeks=>$pesan_tampil){
                $noPesan++;  
                echo "&nbsp; $noPesan. $pesan_tampil<br>";
            }
            echo "<br>";
        }
        else{
            //Skrip simpan data ke Database
            $sql = mysqli_query($koneksi, "INSERT INTO kelas (id_kelas, nama_kelas, kompetensi_keahlian)
                VALUES('$id_kelas', '$nama_kelas', '$kompetensi_keahlian' )");
            
            if($sql){
                echo "<center><b><font color = 'red' size='4'><p>Data Berhasil disimpan</p>
                </center></b></font></br>
                <meta http-equiv='refresh' content='2'; url=?open=data_kelas>";
            }
            else{
                echo "<center><b><font color='red' size='4'><p>Data Gagal Disimpan!
                <meta http-uquiv='refresh' content='2'; url=?open=data_kelas'>";
            }
            exit;
        }
    }

?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <table cellspacing="1" cellpading="3">
        <tr>
            <td bgcolor="#CCCCCC"><strong>TAMBAH DATA KELAS</strong></td>
        </tr>

        <tr>
            <td>ID KELAS</td>
            <td>:</td>
            <td><input name="id_kelas" type="text" size="10" maxlength="4" /></td>
        </tr>
        <tr>
            <td>NAMA KELAS</td>
            <td>:</td>
            <td><input name="nama_kelas" type="text" size="10" maxlength="4" /></td>
        </tr>
        <tr>
            <td>KOMPETENSI KEAHLIAN</td>
            <td>:</td>
            <td><input name="kompetensi_keahlian" type="text" size="10" maxlength="10" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="btnSimpan" value="  Simpan" /></td>
        </tr>
    </table>
</form>