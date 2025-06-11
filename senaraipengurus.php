<?PHP 
include('header.php');

include('connect.php');

echo"<h2>Senarai Pengurus</h2>
<p style='color:#030303'>| <a href='menuutamapengurus.php' style='color:#009933'>Menu Utama</a> |</p>";
echo"<form action='senaraipengurus.php' method='POST' target='_SELF'>
<table>
<tr>
<td>
ID Pengurus: <select name='IDPengurus' required>
<option disabled selected value>Pilih - ID Pengurus</option>";

//mencari data 
$sqlpengurus=mysqli_query($jescdb,"SELECT* from pengurus");

//memaparkan data pada option 
while($data=mysqli_fetch_array($sqlpengurus)){
    echo"<option value='".$data['IDPengurus']."'>".$data['IDPengurus']."</option>";
}
echo"</select>
</td>
<td><input type='submit' name='hantar' value='Papar'></td>

</tr>
</table>
</form>";

//menguji kewujudan data
if(!empty($_POST)){

//langkah: mengambil data
$idpengurus=$_POST['IDPengurus'];

$sqlselect=mysqli_query($jescdb,"SELECT* from pengurus where pengurus.IDPengurus='".$idpengurus."'");
$bil=mysqli_num_rows($sqlselect);
//langkah 7 : jika hilangan rows lebih besar >0
if($bil!=0)
{

echo"
<table border='1' cellpadding='5' cellspacing='1'>
    <tr>
         <th bgcolor=#fcf49c>Bil</th>
         <th bgcolor=#fcf49c>ID Pengurus</th>
         <th bgcolor=#fcf49c>Nama Pengurus</th>
         <th bgcolor=#fcf49c>No.K/P</th>
         <th bgcolor=#fcf49c>Kata Laluan</th>
    </tr>";

    $pembilang=1;
while($row=mysqli_fetch_array($sqlselect)){
    echo"
    <tr>
         <td>".$pembilang."</td>
         <td>".$row['IDPengurus']."</td>
         <td>".$row['NamaPengurus']."</td>
         <td>".$row['NoKP']."</td>
         <td>".$row['KataLaluan']."</td>
    </tr>";
    $pembilang++;
}
echo"</table>";
}
echo"<p>Sebanyak ".$bil." rekod ditemui</p>";
}
include('footer.php');
?>