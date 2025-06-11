<?PHP
//langkah 1 : memanggil fail connection
include('connect.php');

//langkah 2 : mengambil data yang
//dihantar secara get pada link padam
$idpelanggan=$_GET['IDPelanggan'];

//langkah 3 : melaksanakan arahan menghapus rekod
if(mysqli_query($jescdb,"delete from pelanggan where IDPelanggan='".$idpelanggan."'"))
{

//langkah 3.1 : arahan untuk memaparkan popup dan kembali ke senaraipengguna
echo"<script>alert('Rekod telah dihapuskan');
window.location.href='senaraipelangganadmin.php';
</script>";
}

else
{   //langkah 3.2 : arahan untuk memaparkan popup dan kembali ke page senaraipengguna
    echo"<script>alert('Rekod GAGAL dihapuskan');
    </script>";
}

?>