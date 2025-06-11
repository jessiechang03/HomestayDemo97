<?PHP
include('connect.php');
include('header.php');
$idtempahan=$_SESSION['IDTempahan'];
$idpelanggan=$_SESSION['IDPelanggan'];
$nobilik=$_SESSION['NoBilik'];
$datemasuk=$_SESSION['TarikhDaftarMasuk'];
$tarikhdaftarkeluar=$_SESSION['TarikhDaftarKeluar'];
$idpengurus=$_SESSION['IDPengurus'];
$total=$_SESSION['JumlahHarga'];

echo"<h2>Resit Pembayaran</h2><hr>
<P> Terima kasih atas penempahan, ini resit anda: <P><br>
<table>
    <b>ID TEMPAHAN: </b>".$idtempahan."<br><br>
    <b>ID PELANGGAN: </b>".$idpelanggan."<br><br>
    <b>ID PENGURUS: </b>".$idpengurus."<br><br>
    <b>NO. BILIK: </b>".$nobilik."<br><br>
    <b>TARIKH DAFTAR MASUK: </b>".$datemasuk."<br><br>
    <b>TARIKH DAFTAR KELUAR: </b>".$tarikhdaftarkeluar."<br><br>
    <b>JUMLAH HARGA: </b>".$total."
</table>";

?>
<br><hr>
<input type='submit' value='cetak' onClick='window.print()' align='center'>
<br>
<p>Selepas screenshot atau cetak resit,tekan<a href=menuutamapelanggan.php><b style='color:red'> di sini </b></a>untuk pulang ke menu utama.</p>

<?PHP

       //destroy specific session
       unset($_SESSION['IDPengurus']);
       unset($_SESSION['NoBilik']);
       unset($_SESSION['TarikhDaftarMasuk']);
       unset($_SESSION['TarikhDaftarKeluar']);
       unset($_SESSION['JumlahHarga']);

?>

<?PHP include('footer.php');?>