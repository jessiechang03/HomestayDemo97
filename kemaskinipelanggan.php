<?PHP

include('header.php');
//langkah 1:
include('connect.php');

echo"<h2>Kemaskini Pelanggan</h2>
<p style='color:#030303'>| <a href='menuutamaadmin.php' style='color:#009933'>Menu Utama</a> | 
<a href ='senaraipelangganadmin.php' style='color:#009933'>Senarai Pelanggan |</a></p>";

//langkah 2:
$idpelangganW=$_GET['IDPelanggan'];

//langkah 3:
$sqlcari=mysqli_query($jescdb,"select*
from pelanggan where IDPelanggan='$idpelangganW'");

//langkah 4:
$data=mysqli_fetch_array($sqlcari);

?>

<form action='kemaskinipelanggan.php?IDPelanggan=<?PHP echo $idpelangganW; ?>' method='POST'>

<table>

    <tr>
       <td align='right' width='50%'>ID Pelanggan : </td>
       <!--memasukkan data idahli di dalam input-->
       <td><input type='text' name='IDPelanggan' maxlength='10' value="<?PHP echo $data['IDPelanggan'];?>"></td>
    </tr>

    <tr>
       <td align='right' width='50%'>Nama Pelanggan : </td>
       <!--memasukkan data nama ahli di dalam input-->
       <td><input type='text' name='NamaPelanggan' value="<?PHP echo $data['NamaPelanggan'];?>"></td>
    </tr>

    <tr>
       <td align='right' width='50%'>No Telefon : </td>
       <!--memasukkan data no telefon di dalam input-->
       <td><input type='text' name='NoTel' required minlength='10' required maxlength='11' value="<?PHP echo $data['NoTel'];?>" onkeypress='return nomsahaja(event)'></td>
    </tr> 
    
    <tr>
       <td align='right' width='50%'>No K/P :</td>
       <!--memasukkan data nokp di dalam input-->
       <td><input type='text' name='NoKP' required maxlength='12' value="<?PHP echo $data['NoKP'];?>"></td>
    </tr>

    <tr>
       <td align='right' width='50%'>Kata Laluan :</td>
       <!--memasukkan data nokp di dalam input-->
       <td class="inputBox">
       <input type='password' name='KataLaluan' required minlength='8' required maxlength='14' value="<?PHP echo $data['KataLaluan'];?>" id="password"> 
       <div id="toggle" onclick="showHide();"></div>
       </td>
    </tr>

    <tr>
       <td></td>
       <td><br><input type='submit' value='Kemaskini'></td>
    </tr>   

</table>
</form>

<style>
        h2{
            margin-top: 25px;
        }
        input{
            position:relative;
            height: 20px;
        }
        .inputBox{
            position: relative;
            height: 25px;
        }
        .inputBox input{
            position: absolute;
            top: 0;
            height: 100%;
            box-sizing: border-box;
            outline: none;
        }
        #toggle{
            position: absolute;
            top: 51%;
            right: 8px;
            transform: translateY(-50%);
            width: 26px;
            height: 26px;
            background: url(./images/show.png);
            background-size: cover;
            cursor: pointer;
        }
        #toggle.hide{
            background: url(./images/hide.png);
            background-size: cover;
        }
        </style>
        <script type="text/javascript">
            const password = document.getElementById('password');
            const toggle = document.getElementById('toggle');
            function showHide(){
                if(password.type === 'password'){
                    password.setAttribute('type','text');
                    toggle.classList.add('hide')
                }
                else{
                    password.setAttribute('type','password');
                    toggle.classList.remove('hide')
                }
            }
        </script>

<?PHP include('footer.php');?>

<?PHP
//langkah 6 :
if(!empty($_POST))
{
    $idpelanggan=$_POST['IDPelanggan'];
    $namapelanggan=$_POST['NamaPelanggan'];
    $nokp=$_POST['NoKP'];
    $notelefon=$_POST['NoTel'];
    $katalaluan=$_POST['KataLaluan'];

//langkah 8 :
$idpelanggan = mysqli_real_escape_string($jescdb,$idpelanggan);
$namapelanggan= mysqli_real_escape_string($jescdb,$namapelanggan);
$nokp = mysqli_real_escape_string($jescdb,$nokp);
$notelefon = mysqli_real_escape_string($jescdb,$notelefon);
$katalaluan = mysqli_real_escape_string($jescdb,$katalaluan);

//langkah 9.1 :
if(!is_numeric($nokp)){
    die("<script>alert('Terdapat Aksara di dalam NoKP anda!');
    window.history.back();</script>");
}

//langkah 9.2 :
if(strlen($nokp)!=12) {
    die("<script>alert('Digit NoKP yang dimasukkan tidak tepat!');
    window.history.back();</script>");
}

//langkah 9.3 :
if(strlen($idpelanggan)!=7) {
    die("<script>alert('Digit IDPelanggan yang dimasukkan tidak tepat! Sila isi hanya 7 aksara sahaja.');
    window.history.back();</script>");
}

//langkah 10 :
if(mysqli_query($jescdb,"update pelanggan set
IDPelanggan='$idpelanggan',NamaPelanggan='$namapelanggan', NoKP='$nokp',NoTel='$notelefon',KataLaluan='$katalaluan' where IDPelanggan='$idpelangganW' "))
{
    //langkah 10.1 :
    echo"<script>alert('Kemaskini BERJAYA!');
    window.location.href='senaraipelangganadmin.php';</script>";
}
else
{
    //langkah 10.2 :
    echo"<script>alert('Kemaskini TIDAK BERJAYA!.');
    window.history.back();</script>";
}



}
?>
        