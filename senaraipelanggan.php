<?PHP 
include('header.php');

include('connect.php');

echo"<h2>Senarai Pelanggan</h2>
<p style='color:#030303'>| <a href='menuutamapengurus.php' style='color:#009933'>Menu Utama</a> |</p>";
echo"<form action='senaraipelanggan.php' method='POST' target='_SELF'>
<table>
<tr>
<td>
ID Pelanggan: <select name='IDPelanggan' required>
<option disabled selected value>Pilih - ID Pelanggan</option>";

//mencari data 
$sqlpelanggan=mysqli_query($jescdb,"SELECT* from pelanggan");

//memaparkan data pada option 
while($data=mysqli_fetch_array($sqlpelanggan)){
    echo"<option value='".$data['IDPelanggan']."'>".$data['IDPelanggan']."</option>";
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
$idpelanggan=$_POST['IDPelanggan'];

$sqlselect=mysqli_query($jescdb,"SELECT* from pelanggan where pelanggan.IDPelanggan='".$idpelanggan."'");
$bil=mysqli_num_rows($sqlselect);
//langkah 7 : jika hilangan rows lebih besar >0
if($bil!=0)
{

echo"
<table border='1' cellpadding='5' cellspacing='1'>
    <tr>
         <th bgcolor=#fcf49c>Bil</th>
         <th bgcolor=#fcf49c>ID Pelanggan</th>
         <th bgcolor=#fcf49c>Nama Pelanggan</th>
         <th bgcolor=#fcf49c>No.K/P</th>
         <th bgcolor=#fcf49c>No.Telefon</th>
         <th bgcolor=#fcf49c>Kata Laluan</th>
    </tr>";

    $pembilang=1;
while($row=mysqli_fetch_array($sqlselect)){
    echo"
    <tr>
         <td>".$pembilang."</td>
         <td>".$row['IDPelanggan']."</td>
         <td>".$row['NamaPelanggan']."</td>
         <td>".$row['NoKP']."</td>
         <td>".$row['NoTel']."</td>
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