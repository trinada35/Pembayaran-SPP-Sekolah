<h3>Transaksi Pembayaran SPP</h3>
<form method="get" action="">
    nisn: <input type="text" name="nisn" />
    <input type="hidden" id="open" name="open" value="data_pembayaran" />
    <input type="submit" name="cari" value="Cari Siswa" />

</form>

<?php 
    include_once "../src/koneksi.php";
    if(isset($_GET['nisn']) && $_GET['nisn']!=''){
        $sqlSiswa = mysqli_query($koneksi, "SELECT * FROM kelas JOIN siswa on kelas.id_kelas = siswa.id_kelas
        join spp on siswa.id_spp = spp.id_spp WHERE nisn='$_GET[nisn]'");
        $data=mysqli_fetch_array($sqlSiswa);
        $nisn = $data['nisn'];
?>

<h3>Biodata Siswa</h3>
<table>
    <tr>
        <td>nisn</td>
        <td>:</td>
        <td><?php echo $data['nisn']; ?></td>
    </tr>
    <tr>
        <td>Nama Siswa</td>
        <td>:</td>
        <td><?php echo $data['nama']; ?></td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>:</td>
        <td><?php echo $data['nama_kelas']; ?></td>
    </tr>
</table>

<h3>Tagih SPP Siswa</h3>
<table border="1">
    <tr>
        <td>NO</td>
        <td>Bulan</td>
        <td>Tahun</td>
        <td>No. Bayar</td>
        <td>Tgl. Bayar</td>
        <td>Jumlah</td>
        <td>Keterangan</td>
        <td>Bayar</td>
    </tr>

    <?php 
    $sql = mysqli_query($koneksi, "SELECT * FROM pembayaran JOIN spp on 
    pembayaran.id_spp = spp.id_spp WHERE nisn='$data[nisn]'");
    $no=1;
    while($data=mysqli_fetch_array($sql)){
        echo "<tr>
        <td>$no</td>
        <td>$data[bulan_tagihan]</td>
        <td>$data[tahun_tagihan]</td>
        <td>$data[no_bayar]</td>
        <td>$data[tgl_pembayaran]</td>
        <td>$data[nominal]</td>
        <td>$data[keterangan]</td>
         <td align='center'>";
            if($data['no_bayar']==''){
                echo "<a href='proses_pembayaran.php?nisn=$nisn&act=bayar&
                id_pembayaran=$data[id_pembayaran]'>Bayar</a>";
            }else{
                echo "-";
            }
            echo "</td>
        </tr>";
        $no++;
    }
    ?>
<table>
    <?php 
    }
    ?>
    <p>Pembayaran SPP dilakukan dengan mencaru tagihan siswa dengan
        NISN melalui form di atas, kemudian proses pembayaran</p>
</table>
    
</table>