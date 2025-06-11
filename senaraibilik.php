<?PHP 
include('header.php');

include('connect.php');

echo"<h2>Senarai Bilik</h2>
<p style='color:#030303'>| <a href='menuutamapengurus.php' style='color:#009933'>Menu Utama</a> |</p>";
echo"<form action='senaraibilik.php' method='POST' target='_SELF'>
<table>
<tr>
<td>
No. Bilik: <select name='NoBilik' required>
<option disabled selected value>Pilih - NoBilik</option>";

//mencari data 
$sqlbilik=mysqli_query($jescdb,"SELECT* from bilik");

//memaparkan data pada option 
while($data=mysqli_fetch_array($sqlbilik)){
    echo"<option value='".$data['NoBilik']."'>".$data['NoBilik']."</option>";
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
$nobilik=$_POST['NoBilik'];

$sqlselect=mysqli_query($jescdb,"SELECT* from bilik,kategoribilik WHERE bilik.JenisBilik=kategoribilik.JenisBilik AND bilik.NoBilik='".$nobilik."'");
$bil=mysqli_num_rows($sqlselect);
//langkah 7 : jika hilangan rows lebih besar >0
if($bil!=0)
{

echo"
<table border='1' cellpadding='5' cellspacing='1'>
    <tr>
         <th bgcolor=#fcf49c>Bil</th>
         <th bgcolor=#fcf49c>No Bilik</th>
         <th bgcolor=#fcf49c>Jenis Bilik</th>
         <th bgcolor=#fcf49c>Harga</th>
    </tr>";

    $pembilang=1;
while($row=mysqli_fetch_array($sqlselect)){
    echo"
    <tr>
         <td>".$pembilang."</td>
         <td>".$row['NoBilik']."</td>
         <td>".$row['JenisBilik']."</td>
         <td>".$row['Harga']."</td>
    </tr>";
    $pembilang++;
}
echo"</table>";
}
echo"<p>Sebanyak ".$bil." rekod ditemui</p>";
}
include('footer.php');
?>