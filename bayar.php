<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPP ONLINE</title>
    <link rel="stylesheet" href="style.css" href="src/style.css">
</head>
<body>
    <br>
    <br>
    <header>
        <h1 class="judul">PEMBAYARAN SPP ONLINE 3 BANJARBARU</h1>
    </header>
    <div class="wrap">
        <div class="blog">
            <div class="conteudo">
                <h3>Transaksi Pembayar SPP</h3>
                <form action="" method="get">
                    nisn: <input type="text" name="nisn" />
                    <input type="hidden" id="open" name="open" value="data_pembayaran" />
                    <input type="submit" name="cari" value="Cari Siswa" />
                </form>

                <?php 
                    include_once "src/koneksi.php";
                    if(isset($_GET['nisn']) && $_GET['nisn']!=''){
                        $sqlSiswa = mysqli_query($koneksi, "SELECT * FROM kelas join siswa on kelas.id_kelas = siswa.id_kelas
                        join spp on siswa.id_spp = spp.id_spp WHERE nisn='$_GET[nisn]'");
                        $data = mysqli_fetch_array($sqlSiswa);
                        $nisn = $data['nisn'];
                ?>

                <h3>Biodata Siswa</h3>
                <table>
                    <tr>
                        <td>nisn</td>
                        <td>:</td>
                        <td><?php echo $data['nama']; ?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?php echo $data['nama_kelas']; ?></td>
                    </tr>
                </table>

                <h3>Tagihan SPP Siswa</h3>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>No. Bayar</th>
                        <th>Tgl. Bayar</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                    </tr>
                    
                    <?php 
                        $sql = mysqli_query($koneksi, "SELECT * FROM pembayaran join spp on
                        pembayaran.id_spp = spp.id_spp WHERE nisn='$data[nisn]'");
                        $no=1;
                        while($data=mysqli_fetch_array($sql)){
                            echo "   <tr>
                                <td>$no</td>
                                <td>$data[bulan_tagihan]</td>
                                <td>$data[tahun_tagihan]</td>
                                <td>$data[no_bayar]</td>
                                <td>$data[tgl_pembayar]</td>
                                <td>$data[nominal]</td>
                                <td>$data[keteranga]</td>
                        </tr>"; 
                        $no++;
                        }
                    ?>
                </table>
                
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>