<?PHP 
include('header.php');

//langkah 1 : memanggil fail connection 
include('connect.php');

//mencari data 
$sqls=mysqli_query($jescdb,"SELECT* from bilik");

//langkah membina form daripada drop down list 
echo"<h2> Senarai Maklumat Tempahan ikut No.Bilik</h2>
<p style='color:#030303'>| <a href='menuutamaadmin.php' style='color:#009933'>Menu Utama</a> |</p>
<form action='analisisadmin.php' method='POST'>
No. Bilik:  <select name='NoBilik' required>
<option disabled selected value>Pilih - NoBilik</option>";


//memaparkan data pada option 
while($data=mysqli_fetch_array($sqls))
{
    echo"<option
    value='".$data['NoBilik']."'>
    ".$data['NoBilik']."
    </option>";
}
echo"</select>
<input type='submit' name='hantar' value='Papar'>
</form>";

//menguji kewujudan data
if(!empty($_POST))
{
    //langkah: mengambil data
    $NoBilik=$_POST['NoBilik'];

    //Memilih data dari jadual 
    $sqlselect=mysqli_query($jescdb,"SELECT*
    FROM tempahan
    where
    tempahan.NoBilik='$NoBilik'");

//langkah 6: mengambil data 
$bil=mysqli_num_rows($sqlselect);

//langkah 7 : jika hilangan rows lebih besar >0
if($bil!=0)
{
    
    //langkah 8: menyediakan header jadual 
    echo"
    <br><input type='submit' value='Cetak' onClick='window.print()'><br>
    <br><table border='1' cellpadding='2' cellspacing='1' margin='10px'>
    <tr>
    <th bgcolor=#fcf49c>Bil</th>
    <th bgcolor=#fcf49c>ID Tempahan</th>
    <th bgcolor=#fcf49c>ID Pelanggan</th>
    <th bgcolor=#fcf49c>ID Pengurus</th>
    <th bgcolor=#fcf49c>No. Bilik</th>
    <th bgcolor=#fcf49c>Tarikh Check-In</th>
    <th bgcolor=#fcf49c>Tarikh Check-Out</th>
    <th bgcolor=#fcf49c>Jumlah Harga</th>
    <th bgcolor=#fcf49c>Kemaskini</th>
    <th bgcolor=#fcf49c>Padam</th>
    </tr>";

//langkah 9: mengambil dan memaparkan data 
$pembilang=1;
while($row=mysqli_fetch_array($sqlselect))
{
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
    <td><a href='kemaskinianalisis.php?IDTempahan=".$row['IDTempahan']."' style='color:#0000ff'>Kemaskini</a></td>
    <td><a href='deleteanalisis.php?IDTempahan=".$row['IDTempahan']."'
    onClick=\"return confirm('Anda pasti ingin padam data ini?')\" style='color:#ff0000'>Padam</a></td>
    </tr>";
    $pembilang++;
}
echo"</table>";
}

echo"<p>Sebanyak ".$bil." rekod ditemui</p>";
}
include('footer.php');

?>