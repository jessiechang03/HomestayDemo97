<?PHP

include('header.php');
//langkah 1:
include('connect.php');

echo"<h2>Kemaskini Senarai Laporan Tempahan</h2>
<p style='color:#030303'>| <a href='menuutamaadmin.php' style='color:#009933'>Menu Utama</a> | 
<a href ='senarailaporanadmin.php' style='color:#009933'>Senarai Laporan |</a></p>";

//langkah 2:
$idtempahanW=$_GET['IDTempahan'];

//langkah 3:
$sqlcari=mysqli_query($jescdb,"select*
from tempahan where IDTempahan='$idtempahanW'");

//langkah 4:
$data=mysqli_fetch_array($sqlcari);

?>

<form action='kemaskinitempahan.php?IDTempahan=<?PHP echo $idtempahanW; ?>' method='POST'>

<table width='40%'>

    <tr>
       <td align='right' width='50%'>ID Tempahan : </td>
       <!--memasukkan data IDTempahan di dalam input-->
       <td><input type='text' name='IDTempahan' value="<?PHP echo $data['IDTempahan'];?>"></td>
    </tr>

    <tr>
       <td align='right' width='50%'>ID Pelanggan : </td>
       <!--memasukkan data id pelanggan di dalam input-->
       <td><input type='text' name='IDPelanggan' value="<?PHP echo $data['IDPelanggan'];?>"></td>
    </tr>

    <tr>
       <td align='right' width='50%'>ID Pengurus : </td>
       <!--memasukkan data IDPengurus di dalam input-->
       <td><input type='text' name='IDPengurus' value="<?PHP echo $data['IDPengurus'];?>"></td>
    </tr>

    <tr>
       <td align='right' width='50%'>No. Bilik : </td>
       <!--memasukkan data NoBilik di dalam input-->
       <td><input type='text' name='NoBilik' value="<?PHP echo $data['NoBilik'];?>"></td>
    </tr>

    <tr>
       <td align='right'>Tarikh Daftar Masuk :</td>
       <!--memasukkan data TarikhDaftarMasuk di dalam input-->
       <td><input type='text' name='TarikhDaftarMasuk' value="<?PHP echo $data['TarikhDaftarMasuk'];?>"></td>
    </tr>

    <tr>
       <td align='right'>Tarikh Daftar Keluar :</td>
       <!--memasukkan data TarikhDaftarKeluar di dalam input-->
       <td><input type='text' name='TarikhDaftarKeluar' value="<?PHP echo $data['TarikhDaftarKeluar'];?>"></td>
    </tr>
    <tr>
       <td align='right' width='50%'>Jumlah Harga : </td>
       <!--memasukkan data JumlahHarga di dalam input-->
       <td><input type='text' name='JumlahHarga' value="<?PHP echo $data['JumlahHarga'];?>"></td>
    </tr> 

    <tr>
       <td></td>
       <td><input type='submit' value='Kemaskini'></td>
    </tr>   

</table>
</form>

<?PHP include('footer.php');?>

<?PHP
//langkah 6 :
if(!empty($_POST))
{
    $idtempahan=$_POST['IDTempahan'];
    $idpelanggan=$_POST['IDPelanggan'];
    $idpengurus=$_POST['IDPengurus'];
    $nobilik=$_POST['NoBilik'];
    $tarikhdaftarmasuk=$_POST['TarikhDaftarMasuk'];
    $tarikhdaftarkeluar=$_POST['TarikhDaftarKeluar'];
    $jumlahharga=$_POST['JumlahHarga'];
//langkah 8 :
$idtempahan = mysqli_real_escape_string($jescdb,$idtempahan);
$idpelanggan = mysqli_real_escape_string($jescdb,$idpelanggan);
$idpengurus = mysqli_real_escape_string($jescdb,$idpengurus);
$nobilik = mysqli_real_escape_string($jescdb,$nobilik);
$tarikhdaftarmasuk= mysqli_real_escape_string($jescdb,$tarikhdaftarmasuk);
$tarikhdaftarkeluar= mysqli_real_escape_string($jescdb,$tarikhdaftarkeluar);
$jumlahharga = mysqli_real_escape_string($jescdb,$jumlahharga);

//langkah 9 :
if(mysqli_query($jescdb,"update tempahan set
IDTempahan='$idtempahan',IDPelanggan='$idpelanggan',IDPengurus='$idpengurus',NoBilik='$nobilik',TarikhDaftarMasuk='$tarikhdaftarmasuk',TarikhDaftarKeluar='$tarikhdaftarkeluar',JumlahHarga='$jumlahharga' where IDTempahan='$idtempahanW' "))
{
    //langkah 9.1 :
    echo"<script>alert('Kemaskini BERJAYA!');
    window.location.href='senarailaporanadmin.php';</script>";
}
else
{
    //langkah 9.2 :
    echo"<script>alert('Kemaskini TIDAK BERJAYA!.');
    window.history.back();</script>";
}

}
?>