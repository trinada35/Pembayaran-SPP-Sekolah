<?php 
    include_once "../src/koneksi.php";

    #SKRIP TOMBOL SIMPAN DIKLIK
    if(isset($_POST['btnSimpan'])){
        $id_petugas =$_POST['id_petugas'];
        $username =$_POST['username'];
        $password =$_POST['password'];
        $nama_petugas =$_POST['nama_petugas'];
        $level =$_POST['level'];

        //validasi form inputs
        $pesanError = array();
        if (trim($id_petugas)==""){
            $pesanError[]= "Data <b>ID PETUGAS</b> tidak boleh kosong ";
        }
        if (trim($username)==""){
            $pesanError[]= "Data <b>USERNAME</b> tidak boleh kosong ";
        }
        if (trim($password)==""){
            $pesanError[]= "Data <b>PASSWORD</b> tidak boleh kosong ";
        }
        if (trim($nama_petugas)==""){
            $pesanError[]= "Data <b>NAMA PETUGAS</b> tidak boleh kosong ";
        }
        if (trim($level)==""){
            $pesanError[]= "Data <b>LEVEL</b> tidak boleh kosong ";
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
            $sql = mysqli_query($koneksi, "INSERT INTO petugas (id_petugas, username, password, nama_petugas, level)
                VALUES('$id_petugas', '$username', md5('$password'), '$nama_petugas', '$level' )");
            
            if($sql){
                echo "<center><b><font color = 'red' size='4'><p>Data Berhasil disimpan</p>
                </center></b></font></br>
                <meta http-equiv='refresh' content='2'; url=?open=data_petugas>";
            }
            else{
                echo "<center><b><font color='red' size='4'><p>Data Gagal Disimpan!
                <meta http-uquiv='refresh' content='2'; url=?open=data_petugas'>";
            }
            exit;
        }
    }

?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <table cellspacing="1" cellpading="3">
        <tr>
            <td bgcolor="#CCCCCC"><strong>TAMBAH DATA PETUGAS</strong></td>
        </tr>

        <tr>
            <td>ID PETUGAS</td>
            <td>:</td>
            <td><input name="id_petugas" type="text" size="10" maxlength="10" /></td>
        </tr>
        <tr>
            <td>USERNAME</td>
            <td>:</td>
            <td><input name="username" type="text" size="10" maxlength="50" /></td>
        </tr>
        <tr>
            <td>PASSWORD</td>
            <td>:</td>
            <td><input name="password" type="password" size="10" maxlength="10" /></td>
        </tr>
        <tr>
            <td>NAMA PETUGAS</td>
            <td>:</td>
            <td><input name="nama_petugas" type="text" size="10" maxlength="50" /></td>
        </tr>
        <tr>
            <td>LEVEL</td>
            <td>:</td>
            <td>
                <select name="level">
                    <option value="kosong">-- Pilih Level--</option>
                    <option value="admin">admin</option>
                    <option value="Kosong">petugas</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="btnSimpan" value=" Simpan" /></td>
        </tr>
    </table>
</form>