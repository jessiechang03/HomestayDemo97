<?PHP 
include('header.php');

include('connect.php');
$sqlselect=mysqli_query($jescdb,"SELECT* from tempahan order by IDTempahan ASC");

echo"<h1>Senarai Laporan</h1>
<p style='color:#030303'>| <a href='menuutamapengurus.php' style='color:#009933'>Menu Utama</a> |</p>";
echo"
<table border='1' cellpadding='1' cellspacing='1'>
    <tr>
         <th bgcolor=#fcf49c>Bil</th>
         <th bgcolor=#fcf49c>IDTempahan</th>
         <th bgcolor=#fcf49c>IDPelanggan</th>
         <th bgcolor=#fcf49c>IDPengurus</th>
         <th bgcolor=#fcf49c>NoBilik</th>
         <th bgcolor=#fcf49c>TarikhDaftarMasuk</th>
         <th bgcolor=#fcf49c>TarikhDaftarKeluar</th>
         <th bgcolor=#fcf49c>JumlahHarga</th>
    </tr>";

    $pembilang=1;
while($row=mysqli_fetch_array($sqlselect)){
    echo"
    <tr>
         <td>".$pembilang."</td>
         <td>".$row['IDTempahan']."</td>
         <td>".$row['IDPelanggan']."</td>
         <td>".$row['IDPengurus']."</td>
         <td>".$row['NoBilik']."</td>
         <td>".$row['TarikhDaftarMasuk']."</td>
         <td>".$row['TarikhDaftarKeluar']."</td>
         <td>".$row['JumlahHarga']."</td>
    </tr>";
    $pembilang++;
}
echo"</table><br></br>";
include('footer.php');
?>
