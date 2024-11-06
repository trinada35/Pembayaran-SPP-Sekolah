<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <style>
        body {
            background: #d2cd7e ;
            margin: 0;
            font-family: 'Open Sans', sans-serif;
        }

        fieldset{
            margin-left: 500px;
            margin: 100 auto;
            width: 320px;
            height: 400px;
            border: 2px solid white;
            background-color: green;
        }

        label{
            font-family: tahoma;
            color:red;
        }

        input{
            position: center;
            margin: 5px;
            padding: 10px;
            width: 300px;
            height: 40px;
            border: 1px solid white;
            border-radius: 10px;
        }

        select{
            pisition: center;
            margin: 5px;
            padding: 10px;
            width: 300px;
            height: 1px solid white;
            border-radius: 10px;
        }

        #submit
        {
            color: white;
            background-color: #428df5;
        }

        #filter_input
        {
            background-color: #c6cfc7;
        }

        img{
            border-radius: 100px;
        }

    </style>
</head>
<body>
     <h1 align="center"><b>SPP </b> ONLINE</h1>
     <form action="login_validasi.php" method="post">
        <fieldset>
            <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan']=="gagal"){
                    echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
                }
            }
            ?>

            <legend align="center">
                <img src="src/pt1.png" alt="" width="75" height="75">
            </legend>
            <table>
                <p align="center"><b>LOGIN</b>
                <tr><td><input name="username" type="text" placeholder="Username" id="input"></td></tr>
                <tr><td><input name="password" type="password" placeholder="Password" id="input"></td></tr>
                <tr><td><input name="login" type="submit" value="LOGIN" id="submit"></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td align="center"><a href="bayar.php">CEK PEMBAYARAN</a></td></tr>
                </p>
            </table>

        </fieldset>
     </form>
</body>
</html>