<?php 
    include_once "../src/koneksi.php";

    #SKRIP TOMBOL SIMPAN DIKLIK
    if(isset($_POST['btnSimpan'])){
        $nisn=$_POST['nisn'];
        $nis=$_POST['nis'];
        $nama=$_POST['nama'];
        $id_kelas=$_POST['id_kelas'];
        $alamat=$_POST['alamat'];
        $no_telp=$_POST['no_telp'];
        $id_spp=$_POST['id_spp'];

        //validasi form inputs
        $pesanError= array();
        if(trim($nisn)==""){
            $pesanError[]="Data <b>NISN </b> tidak boleh kosong!";
        }
        if(trim($nis)==""){
            $pesanError[]="Data <b>NIS </b> tidak boleh kosong!";
        }
        if(trim($nama)==""){
            $pesanError[]="Data <b>NAMA </b> tidak boleh kosong!";
        }
        if(trim($id_kelas)==""){
            $pesanError[]="Data <b>ID KELAS </b> tidak boleh kosong!";
        }
        if(trim($alamat)==""){
            $pesanError[]="Data <b>ALAMAT </b> tidak boleh kosong!";
        }
        if(trim($no_telp)==""){
            $pesanError[]="Data <b>NO TELPON </b> tidak boleh kosong!";
        }
        if(trim($id_spp)==""){
            $pesanError[]="Data <b>ID SPP </b> tidak boleh kosong!";
        }

        //Menampilkan Pesan Error  dari Form
        if(count($pesanError)>=1){
            $noPesan=0;
            foreach ($pesanError as $indeks=>$pesan_tampil){
                $noPesan++;
                echo "&nbsp; $noPesan. $pesan_tampil<br>";
            }
            echo "<br>";
        }
        else{
            //Skrip simpan data ke DATAbase
            $sqlEdit = mysqli_query($koneksi, "UPDATE siswa SET nis='$nis', nama='$nama', 
            id_kelas='$id_kelas', alamat='$alamat', no_telp='$no_telp', id_spp='$id_spp' WHERE nisn='$nisn'");

            if($sqlEdit){
                echo "<center><b><font color ='red' size='4'><p> Data Berhasil diubah </p></center></b></font></br>
                <meta http-equiv='refresh' content='2; url=?open=data_siswa'>";
            }
            else{
                echo "<center><b><font color ='red' size='4'><p> Data Gagal disimpan </p></center></b></font></br>
                <meta http-equiv='refresh' content='2; url=?open=data_siswa'>";
            }
            exit;
        }
    }

    #MEMBACA DATA DARI DATABASE UNTUK DIEDIT
    $nisn = $_GET['nisn'];
    $sql=mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn ='$nisn'");
    $data=mysqli_fetch_array($sql);
?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <table cellspacing="1" cellspacing="3">
        <tr>
            <td bgcolor="#CCCCCC"><strong>EDIT DATA SISWA</strong></td>
        </tr>
        <tr>
            <td><strong>NISN</strong></td>
            <td>:</td>
            <td><input type="text" name="nisn" value="<?php echo $data['nisn']; ?>" size="60" maxlength="100" /></td>
        </tr>
        <tr>
            <td><strong>NIS</strong></td>
            <td>:</td>
            <td><input type="text" name="nis" value="<?php echo $data['nis']; ?>" size="60" maxlength="100" /></td>
        </tr>
        <tr>
            <td><strong>NAMA</strong></td>
            <td>:</td>
            <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>" size="60" maxlength="100" /></td>
        </tr>
        <tr>
            <td><strong>ID KELAS</strong></td>
            <td>:</td>
            <td><input type="text" name="id_kelas" value="<?php echo $data['id_kelas']; ?>" size="60" maxlength="100" /></td>
        </tr>
        <tr>
            <td><strong>ALAMAT</strong></td>
            <td>:</td>
            <td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" size="60" maxlength="100" /></td>
        </tr>
        <tr>
            <td><strong>NO. Telepon</strong></td>
            <td>:</td>
            <td><input type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>" size="60" maxlength="100" /></td>
        </tr>
        <tr>
            <td><strong>NOMINAL</strong></td>
            <td>:</td>
            <td>
                <select name="id_spp">
                    <option value="Kosong">.....</option>
                    <?php 
                        $tampilkanSPP = mysqli_query ($koneksi, "select * from spp");
                        while ($bacaData = mysqli_fetch_array ($tampilkanSPP)){
                            if($bacaData['id_spp']==$data['id_spp']){
                                $cek="selected";
                            }else{
                                $cek="";
                            }
                            echo "<option value= '$bacaData[id_spp]' $cek> $bacaData[nominal]</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input name="btnSimpan" type="submit" id="btnSimpan" value="Simpan" /></td>
        </tr>
    </table>
</form>