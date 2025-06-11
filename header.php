<?PHP
session_start();
if(empty($_SESSION["warnatulisan"])){
    $_SESSION["warnatulisan"]="#030303";
}
//code time out dlm masa 5 minit
$now = time();

if ((isset($_SESSION['logout_selepas']) AND $now > $_SESSION['logout_selepas'] ) AND ($_SERVER['PHP_SELF']!='/HomestayDemo97/index.php' AND $_SERVER['PHP_SELF']!='/HomestayDemo97/daftarpelanggan.php')) {
    echo"
    <script>alert('Session time out! Masa lengah telah melebihi had yang dibenarkan. Sila daftar masuk semula.');
    window.location.href='logout.php';
    </script>
    ";
}


?>
<!DOCTYPE html>
<html lang="ms">
        <head>
            <title>Sistem Pengurusan Tempahan Homestay Demo97</title>
            <link rel="shortcut icon" href="images/logo.png">
            <link rel="stylesheet" type="text/css" href="./css/flickity.min.css">
            <script type='text/javascript'>
                function nomsahaja(e) {
                    var code = (e.which) ? e.which : e.keyCode;
                    if (code > 31 && (code < 48 || code > 57)) {
                    e.preventDefault();
                    }
                }
                </script>
        </head>
        <body style="background: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(./images/Background.png) no-repeat center center fixed;width: 100%;background-size: cover;position: absolute;" text="<?PHP echo $_SESSION["warnatulisan"];?>">
 
<table border='1' align='center'>

    <tr>
        <td>
            <img src='images/Banner.png'>
        </td>
    </tr>
   
    <tr height='45'>
    <td bgcolor='#060c21'>
        <style>
        *{
            text-decoration: none;
        }
        .time{
            margin-top: 6px;
            margin-left: 10px;
        }
        .languages{
            float: right;
            margin-top: -21px;
            margin-right: 10px;
        }
        .button{
            float: right;
            margin-top: -18px;
            margin-right: 10px;
        }
        </style>
         <!--menunjukkan masa-->
        <div class="time">
        <?PHP include('masa.php');?>
        </div>
        <!--memanggil butang untuk mengubah warna tulisan-->
        <div class="button">
        <a href='change_color.php?w=1'><img src='images/Black.png'></a>
        <a href='change_color.php?w=2'><img src='images/Red.png'></a>
        <a href='change_color.php?w=3'><img src='images/Orange.png'></a>
        <a href='change_color.php?w=4'><img src='images/Blue.png'></a>
        <a href='change_color.php?w=5'><img src='images/Green.png'></a>
        </div>
        <div class="languages">
        <?PHP include('translate.php');?>
        </div>
    </td>
    </tr>
    <tr height='350' width='400' Valign='top' align='center'>
        <td bgcolor="white" class="navigation" id="wrapper">