<?PHP
session_start();
$w=$_GET['w'];
switch($w)
{
 case 1:$_SESSION["warnatulisan"]="#030303";break;
 case 2:$_SESSION["warnatulisan"]="#F21443";break;
 case 3:$_SESSION["warnatulisan"]="#FF9900";break;
 case 4:$_SESSION["warnatulisan"]="#0E3FF7";break;
 case 5:$_SESSION["warnatulisan"]="#007959";break;
}
echo "<script>

window.history.back()</script>";
?>