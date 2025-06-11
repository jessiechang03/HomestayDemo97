<?PHP
setcookie(session_name(),'',100);
session_start();
session_destroy();
header ("location:selamatdatang.php");
 ?>
