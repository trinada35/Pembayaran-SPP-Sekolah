<?php 
    include_once "../src/koneksi.php";
?>

<h1><b>DATA PETUGAS</b></h1>
<h4><a href="?open=tambah_petugas">+ Tambah Data</a></h4>
<table cellspacing="1" cellspacing="3">
    <tr>
        <td width="5%" bgcolor="#CCCCCC"><b>No</b></td>
        <td width="15%" bgcolor="#CCCCCC"><b>ID Petugas</b></td>
        <td width="20%" bgcolor="#CCCCCC"><b>Username</b></td>
        <td width="30%" bgcolor="#CCCCCC"><b>Nama Petugas</b></td>
        <td width="30%" bgcolor="#CCCCCC"><b>Level</b></td>
        <td colspan="2" bgcolor="#CCCCCC" align="center"><b>Tools</b></td>
    </tr>
    <?php 
        $sql= mysqli_query($koneksi, "SELECT * FROM petugas ORDER BY id_petugas ASC");
        $nomor = 0;
        while ($data= mysqli_fetch_array($sql)){
            $nomor++;
        
    ?>
    <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $data['id_petugas']; ?></td>
        <td><?php echo $data['username']; ?></td>
        <td><?php echo $data['nama_petugas']; ?></td>
        <td><?php echo $data['level']; ?></td>
        <td width="9%" align="center" ><a href="?open=hapus_petugas&id_petugas=<?php echo $data['id_petugas']; ?>"
            target="_self" onclick="return confirm('YAKIN INGIN MENGHAPUS KELAS INI ...?')">Delete</a></td>
        <td width="9%" align="center" ><a href="?open=edit_petugas&id_petugas=<?php echo $data['id_petugas'] ?>"
            target="_self">Edit</a></td>
    </tr>
<?php } ?>
</table> 