<?PHP
include('header.php');
include('connect.php');
//idtempahan
$sqltempahan=mysqli_query($jescdb,"SELECT IDTempahan
FROM tempahan ORDER BY IDTempahan DESC");
$data=mysqli_fetch_array($sqltempahan);
$kode=$data['IDTempahan'];
$pembilang=substr($kode, 1, 4);
$tambah=(int)$pembilang + 1;
if(strlen($tambah)==1){
    $format="A000".$tambah;
}else if(strlen($tambah)==2){
    $format="A00".$tambah;
}else if(strlen($tambah)==3){
    $format="A0".$tambah;
}else{
    $format="A".$tambah;
}
$idtempahan=$format;
//idpelanggan
$idpelanggan=$_SESSION['IDPelanggan'];
//tarikhdaftar
$tarikhdaftarmasuk=$_SESSION['TarikhDaftarMasuk'];
$tarikhdaftarkeluar=$_SESSION['TarikhDaftarKeluar'];
//nobilik
$Z=$_GET['Z'];
$sqlbilik=mysqli_query($jescdb,"SELECT* FROM bilik,kategoribilik WHERE bilik.JenisBilik=kategoribilik.JenisBilik AND NoBilik = '$Z'");
$row=mysqli_fetch_array($sqlbilik);
//pengurus
$sqlpengurus=mysqli_query($jescdb,"SELECT * FROM pengurus ORDER BY RAND ( ) LIMIT 1");
$get=mysqli_fetch_array($sqlpengurus);
$idpengurus=$get['IDPengurus'];

switch($Z)
{

 case '131':$image='131.png';
}

switch($Z)
{
    case '137':$image='137.png';
}

switch($Z)
{
    case '205':$image='205.png';
}

switch($Z)
{
    case '245':$image='245.png';
}

switch($Z)
{
    case '666':$image='666.png';
}

switch($Z)
{
    case '696':$image='696.png';
}

switch($Z)
{
    case '853':$image='853.png';
}

switch($Z)
{
    case '857':$image='857.png';
}

echo"<style>
.container{
    position: relative;
}
.container .frame {
    position: absolute;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    margin-top: 140px;
    left: -250px;
    color: white;
    font-size: 16px;
    padding: 3px 10px;
    border: none;
    cursor: pointer;
    text-align: center;
    transition: 0.3s;
}
.gambar {
    text-align: center;
    width: 300px;
    height: 210px;
    border: 2px solid blue;
    margin: 4px;
    padding: 6px;
    z-index: -1;
}
.data{
    float: right;
    margin-right: 180px;
}
</style>";
?>
<?PHP
include('connect.php');

// call dateDifference() function to find the number of days between two dates

$date1=date_create("$tarikhdaftarmasuk");
$date2=date_create("$tarikhdaftarkeluar");
$diff=date_diff($date1,$date2);
$diffs= $diff->format("%a");

//date format
$datemasuk=date_format($date1,"d/m/Y");
$datekeluar=date_format($date2,"d/m/Y");

//L2 : menguji data post
       switch($Z)
       {
        case '131':$perday=80.00;break;
        case '137':$perday=80.00;break;
        case '205':$perday=100.00;break;
        case '245':$perday=100.00;break;
        case '666':$perday=300.00;break;
        case '696':$perday=300.00;break;
        case '853':$perday=200.00;break;
        case '857':$perday=200.00;
        }

       $total=$perday*$diffs;
       //Langkah 5:menukar bentuk data
       $idtempahan = mysqli_real_escape_string($jescdb,$idtempahan);
       $tarikhdaftarmasuk = mysqli_real_escape_string($jescdb,$tarikhdaftarmasuk);
       $tarikhdaftarkeluar = mysqli_real_escape_string($jescdb,$tarikhdaftarkeluar);
       $idpelanggan = mysqli_real_escape_string($jescdb,$idpelanggan);
       $nobilik = mysqli_real_escape_string($jescdb,$Z);
       $idpengurus = mysqli_real_escape_string($jescdb,$idpengurus);
       $total = mysqli_real_escape_string($jescdb,$total);


echo"
<div class='data'>
<h2>Paparan Tempahan</h2>
<P>| <a href='pilihbilikadmin.php'>Tukar Bilik Anda</a> |</p>";
echo"
<div class='container'>
<div class='frame'>
<div class='gambar' id='gambar'><img src='images/$image' width='300' height='210'></div>
</div></div>
    <b>ID Pelanggan: </b>".$idpelanggan."<br><br>
    <b>ID Pengurus: </b>".$idpengurus."<br><br>
    <b>Tarikh Daftar Masuk: </b>".$datemasuk."<br><br>
    <b>Tarikh Daftar Keluar: </b>".$datekeluar."<br><br>
    <b>No.Bilik: </b>".$nobilik."<br><br>
    <b>Jenis Bilik: </b>".$row['JenisBilik']."<br><br>
    <b>Harga Bilik: </b>RM ".$row['Harga']."<br><br>
    <b>Bilangan Hari yang ditempah: </b>".$diffs."<br><br>
    <b>Jumlah Harga Tempahan: </b>RM ".$total."<br><br>
    ";
?>
<form method='POST' action=''>
    <table>
<tr>
           <td><input hidden type='text' name='hidden' value='hidden'>
           </td>
        </tr>
    <tr>
    <td></td>
    <td>       
            <input type='submit' value='Tempah'>
    </td>
    </tr>

    </table>
</form>
<br></br>

<?PHP
if($_POST){
    if(!empty($idtempahan && $tarikhdaftarmasuk && $tarikhdaftarkeluar && $idpelanggan && $nobilik && $idpengurus && $total)){
       if(mysqli_query($jescdb,"INSERT INTO tempahan
            (IDTempahan,TarikhDaftarMasuk,TarikhDaftarKeluar,IDPelanggan,NoBilik,IDPengurus,JumlahHarga)
            VALUES ('$idtempahan','$datemasuk','$datekeluar','$idpelanggan','$nobilik','$idpengurus','$total')
            ")){
      
       //masukkan data ke dalam pangkalan data
       $_SESSION['IDTempahan']=$idtempahan;
       $_SESSION['IDPelanggan']=$idpelanggan;
       $_SESSION['IDPengurus']=$idpengurus;
       $_SESSION['NoBilik']=$nobilik;
       $_SESSION['TarikhDaftarMasuk']=$datemasuk;
       $_SESSION['TarikhDaftarKeluar']=$datekeluar;
       $_SESSION['JumlahHarga']=$total;

       if(isset($_SESSION)){
       echo "<script>
            alert('Tempahan berjaya.Jumlah Harga Tempahan ialah RM '+ $total)
            window.location.href='resitadmin.php';</script>";
            }}else{
                 echo "<script>
            alert('Tempahan gagal.')
            window.location.href='tempahanadmin.php';</script>";
            }

    }
}

?>

<?PHP include('footer.php');?>