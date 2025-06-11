<?PHP
//langkah 1 : memanggil fail connection
include('connect.php');

//langkah 2 : mengambil data yang
//dihantar secara get pada link padam
$idpengurus=$_GET['IDPengurus'];

//langkah 3 : melaksanakan arahan menghapus rekod
if(mysqli_query($jescdb,"delete from pengurus where IDPengurus='".$idpengurus."'"))
{

//langkah 3.1 : arahan untuk memaparkan popup dan kembali ke senaraipengguna
echo"<script>alert('Rekod telah dihapuskan');
window.location.href='senaraipengurusadmin.php';
</script>";
}

else
{   //langkah 3.2 : arahan untuk memaparkan popup dan kembali ke page senaraipengguna
    echo"<script>alert('Rekod GAGAL dihapuskan');
    </script>";
}

?>