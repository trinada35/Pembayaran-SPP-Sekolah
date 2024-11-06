<?php 
    include_once "../src/koneksi.php";

    #SKRIP TOMBOL SIMPAN DIKLIK
    if(isset($_POST['btnSimpan'])){  
        $id_kelas=$_POST['id_kelas'];
        $nama_kelas=$_POST['nama_kelas'];
        $kompetensi_keahlian=$_POST['kompetensi_keahlian'];

        //validasi form inputs
        $pesanError= array();
        if(trim($id_kelas)==""){
            $pesanError[]="Data <b>ID KELAS </b> tidak boleh kosong!";
        }
        if(trim($nama_kelas)==""){
            $pesanError[]="Data <b>NAMA KELAS </b> tidak boleh kosong!";
        }
        if(trim($kompetensi_keahlian)==""){
            $pesanError[]="Data <b>KOMPETANSI KEAHLIAN </b> tidak boleh kosong!";
        }

        //Menampilkan Pesan Error  dari Form
        if(count($pesanError)>=1){
            $noPesan=0;
            foreach ($pesanError as $indeks=>$pesan_tampil){
                $noPesan++;
                echo "&nbsp; $noPesan. $pesan_tampil<br>";
            }
            echo "</div> <br>";
        }
        else{
            //Skrip simpan data ke DATAbase
            $id_kelas=$_POST['id_kelas'];
            $sqlEdit = mysqli_query($koneksi, "UPDATE kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas='$id_kelas'");

            if($sqlEdit){
                echo "<center><b><font color ='red' size='4'><p> Data Berhasil diubah </p></center></b></font></br>
                <meta http-equiv='refresh' content='2; url=?open=data_kelas'>";
            }
            else{
                echo "<center><b><font color ='red' size='4'><p> D </p></center></b></font></br>
                <meta http-equiv='refresh' content='2; url=?open=data_kelas'>";
            }
            exit;
        }
    }

    #MEMBACA DATA DARI DATABASE UNTUK DIEDIT
    $id_kelas = $_GET['id_kelas'];
    $sql=mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas ='$id_kelas'");
    $data=mysqli_fetch_array($sql);
?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self">
    <table class="table-list" width="650" border="0" cellspacing="1" cellspacing="3">
        <tr>
            <td bgcolor="#CCCCCC"><strong>UBAH DATA KELAS</strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td width="182"><strong>ID KELAS</strong></td>
            <td width="6">:</td>
            <td width="440"><input type="text" name="id_kelas" value="<?php echo $data['id_kelas'];  ?>"
                readonly="true" /></td>
        </tr>
        <tr>
            <td><strong>NAMA KELAS</strong></td>
            <td>:</td>
            <td><input type="text" name="nama_kelas" value="<?php echo $data['nama_kelas'] ?>" size="60" maxlength="100" /></td>
        </tr>
        <tr>
            <td><strong>KOMPETANSI KEAHLIAN</strong></td>
            <td>:</td>
            <td><input type="text" name="kompetensi_keahlian" value="<?php echo $data['kompetensi_keahlian'] ?>" size="60" maxlength="100" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input name="btnSimpan" type="submit" id="btnSimpan" value="Simpan" /></td>
        </tr>
    </table>
</form>