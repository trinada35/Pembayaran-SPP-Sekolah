<?php 
    include_once "../src/koneksi.php";

    #SKRIP TOMBOL SIMPAN DIKLIK
    if(isset($_POST['btnSimpan'])){
        $id_petugas=$_POST['id_petugas'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $nama_petugas=$_POST['nama_petugas'];
        $level=$_POST['level'];

        //validasi form inputs
        $pesanError= array();
        if(trim($id_petugas)==""){
            $pesanError[]="Data <b>ID PETUGAS </b> tidak boleh kosong!";
        }
        if(trim($username)==""){
            $pesanError[]="Data <b>USERNAME </b> tidak boleh kosong!";
        }
        if(trim($password)==""){
            $pesanError[]="Data <b>PASSWORD </b> tidak boleh kosong!";
        }
        if(trim($nama_petugas)==""){
            $pesanError[]="Data <b>NAMA PETUGAS </b> tidak boleh kosong!";
        }
        if(trim($level)==""){
            $pesanError[]="Data <b>LEVEL </b> tidak boleh kosong!";
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
            $sqlEdit = mysqli_query($koneksi, "UPDATE petugas SET username='$username', password='$password',
            nama_petugas='$nama_petugas', level='$level' WHERE id_petugas='$id_petugas'");

            if($sqlEdit){
                echo "<center><b><font color ='red' size='4'><p> Data Berhasil diubah </p></center></b></font></br>
                <meta http-equiv='refresh' content='2; url=?open=data_petugas'>";
            }
            else{
                echo "<center><b><font color ='red' size='4'><p> D </p></center></b></font></br>
                <meta http-equiv='refresh' content='2; url=?open=data_petugas'>";
            }
            exit;
        }
    }

    #MEMBACA DATA DARI DATABASE UNTUK DIEDIT
    $id_petugas = $_GET['id_petugas'];
    $sql=mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas ='$id_petugas'");
    $data=mysqli_fetch_array($sql);
?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self">
    <table class="table-list" width="650" border="0" cellspacing="1" cellspacing="3">
        <tr>
            <td bgcolor="#CCCCCC"><strong>UBAH DATA PETUGAS</strong></td>
        </tr>
        <tr>
            <td><strong>ID PETUGAS</strong></td>
            <td>:</td>
            <td><input type="text" name="id_petugas" value="<?php echo $data['id_petugas'];  ?>"
                readonly="true" /></td>
        </tr>
        <tr>
            <td><strong>Username</strong></td>
            <td>:</td>
            <td><input type="text" name="username" value="<?php echo $data['username']; ?>" size="60" maxlength="100" /></td>
        </tr>
        <tr>
            <td><strong>Password</strong></td>
            <td>:</td>
            <td><input type="password" name="password" value="<?php echo $data['password']; ?>" size="60" maxlength="100" /></td>
        </tr>
        <tr>
            <td><strong>Nama Petugas</strong></td>
            <td>:</td>
            <td><input type="text" name="nama_petugas" value="<?php echo $data['nama_petugas']; ?>" size="60" maxlength="100" /></td>
        </tr>
        <tr>
            <td>LEVEL</td>
            <td>:</td>
            <td>
                <select name="level">
                    <option value="kosong">-- Pilih Level--</option>
                    <option value="admin">admin</option>
                    <option value="petugas">petugas</option>
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