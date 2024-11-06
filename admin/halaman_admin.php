<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPP ONLINE</title>
    <link rel="stylesheet" type ="text/css" href="../src/style.css">
</head>
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300);
body{
    background: rgb(191, 223, 243);
    margin:0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

hr{
    border: 0;
    background: rgb(187, 205, 240);
    height: 1px;
}

header{
    text-align: center;
    color: black;
}

header  .judul{
    font-size: 17pt;
}

header .deskripsi{
    font-size: 11pt;
}

.wrap{
    width: 1300px;
    margin: 25px auto;
}

nav.menu ul{
    overflow: hidden;
    color: aliceblue;
    list-style: none;
    float: left;
    padding: 0;
    width: 1300px;
    margin: 0 0 0;
    background: solid blue;
    -webkit-box-shadow: 1px 1px 1px 0px rgb(23, 153, 182);
    -moz-box-shadow: 1px 1px 1px 0px rgb(23, 153, 182);
    box-shadow: 1px 1px 1px 0px rgb(23, 153, 182); 
}

nav.menu ul  li{
    margin:0;
    float: left;
}

nav.menu ul a{
    padding: 25px;
    display: block;
    font-weight: 600;
    font-size: 16px;
    color: aliceblue;
    text-transform: uppercase;
    transition: all 0.5s ease;
    text-decoration: none;
}

nav.menu ul a:hover{
    text-decoration: underline;
    background: rgb(127, 141, 169);
}

.sidebar{
    float: right;
    width: 275px;
}

.sidebar .widget{
    padding: 25px;
    margin: 25px auto;
    background: cornsilk;
    border-bottom: 2px solid white;
    transition: all 0.5s ease;
    font-size: 14px;
}

.sidebar .widget h2{
    padding: 0;
    margin: 0 0 15px;
    color: rgb(160, 40, 136);
    font-size: 18px;
    font-weight: 800;
    text-transform: uppercase;
}

.blog {
    float: left;
    
}

.conteudo{
    padding: 0;
    width: 1000px;
    margin: 0 0 0;
    background-color: white ;
    border: 1px solid crimson;
    margin-top: 20px;
    
}

.conteudo  h1{
    padding: 0;
    margin: 0 0 15px;
    font-weight: normal;
    color: black;
    font-family: Georgia, 'Times New Roman', Times, serif;
}

 @media screen and (max-width: 1300px){
    .header {
        position: inherit;
    }
    .wrap {
        width: 90%;
        margin: 25px auto;
    }
    .sidebar{
        width: 100px;
        margin: 25px 0 0;
        float: right;
    }
    .sidebar .widget{
        padding: 50px;
    }
    nav.menu ul{
        width: 100px;
    }
    nav.menu ul{
        float: inherit;
    }
    nav.menu ul li{
        float: inherit;
        margin: 0;
    }
    nav.menu ul a{
        padding: 15px;
        font-size: 16px;
        border: 1px solid rgb(33, 124, 149);
        border-bottom: 1px solid rgb(23, 116, 142);
    }
    .blog{
        width: 50%;
    }
    .conteude{
        float: inherit;
        margin: 0 25px;
        width: 101px;
        border: 1px solid gray;
        padding: 5%;
        background-color: white;
    }
 }    

</style>

<body>
    <?php 
        session_start();
        //cek apakah yg mengakses hal ini sudah login
        if($_SESSION ['level']==""){
            header("location:index.php?pesan=gagal");
        }
    ?>
    <br><br>
    <!-- header template -->
     <header>
        <h1 class="judul">PEMBAYARAN SPP ONLINE SMKN 3 BJB</h1>
    </header>
    <!-- akhir header template -->

    <!-- menu -->
     <div class="wrap">
        <nav  class="menu">
            <?php include "menu.php" ?>
        </nav>
     </div>
    <!-- akhir menu -->

    <!-- sidebar website -->
     <aside class="sidebar">
        <div class="widget">
            <h2>Selamat Datang,  <?php echo $_SESSION['username']; ?></h2>
            <p>SELAMAT DATANG APLIKASI PEMBAYARAN SPP SMKN 3 BJB</p>
        </div>
     </aside>
    <!-- akhir sidebar website -->

    <!-- isi -->
     <div class="blog">
        <div class="conteudo">
            <?php include "buka_file.php"; ?>
        </div>
     </div>
    <!-- akhir isi -->

</body>
</html>