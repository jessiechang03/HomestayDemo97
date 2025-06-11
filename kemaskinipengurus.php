<?PHP

include('header.php');
//langkah 1:
include('connect.php');

echo"<h2>Kemaskini Pengurus</h2>
<p style='color:#030303'>| <a href='menuutamaadmin.php' style='color:#009933'>Menu Utama</a> | 
<a href ='senaraipengurusadmin.php' style='color:#009933'>Senarai Pengurus |</a></p>";

//langkah 2:
$idpengurusW=$_GET['IDPengurus'];


//langkah 3:
$sqlcari=mysqli_query($jescdb,"select*
from pengurus where IDPengurus='$idpengurusW'");

//langkah 4:
$data=mysqli_fetch_array($sqlcari);

?>

<form action='kemaskinipengurus.php?IDPengurus=<?PHP echo $idpengurusW; ?>' method='POST'>

<table>

    <tr>
       <td align='right' width='50%'>ID Pengurus : </td>
       <!--memasukkan data idahli di dalam input-->
       <td><input type='text' name='IDPengurus' maxlength='10' value="<?PHP echo $data['IDPengurus'];?>"></td>
    </tr>

    <tr>
       <td align='right' width='50%'>Nama Pengurus : </td>
       <!--memasukkan data nama ahli di dalam input-->
       <td><input type='text' name='NamaPengurus' value="<?PHP echo $data['NamaPengurus'];?>"></td>
    </tr>

    <tr>
       <td align='right' width='50%'>No K/P :</td>
       <!--memasukkan data nokp di dalam input-->
       <td><input type='text' name='NoKP' maxlength='12' value="<?PHP echo $data['NoKP'];?>">
       </td>
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
    $idpengurus=$_POST['IDPengurus'];
    $namapengurus=$_POST['NamaPengurus'];
    $nokp=$_POST['NoKP'];
    $katalaluan=$_POST['KataLaluan'];

//langkah 8 :
$idpengurus = mysqli_real_escape_string($jescdb,$idpengurus);
$namapengurus= mysqli_real_escape_string($jescdb,$namapengurus);
$nokp = mysqli_real_escape_string($jescdb,$nokp);
$katalaluan = mysqli_real_escape_string($jescdb,$katalaluan);

//langkah 9.1 :
if(!is_numeric($nokp)){
    die("<script>alert('Terdapat Aksara di dalam NoKP anda!');
    window.history.back();</script>");
}

//langkah 9.2 :
if(strlen($nokp)!=12) {
    die("<script>alert('Digit IDPelanggan yang dimasukkan tidak tepat!');
    window.history.back();</script>");
}

//langkah 9.3 :
if(strlen($idpengurus)!=6) {
    die("<script>alert('Digit IDPengurus yang dimasukkan tidak tepat! Sila isi hanya 6 aksara sahaja.');
    window.history.back();</script>");
}

//langkah 10 :
if(mysqli_query($jescdb,"update pengurus set
IDPengurus='$idpengurus',NamaPengurus='$namapengurus', NoKP='$nokp',KataLaluan='$katalaluan' where IDPengurus='$idpengurusW' "))
{
    //langkah 10.1 :
    echo"<script>alert('Kemaskini BERJAYA!');
    window.location.href='senaraipengurusadmin.php';</script>";
}
else
{
    //langkah 10.2 :
    echo"<script>alert('Kemaskini TIDAK BERJAYA!.');
    window.history.back();</script>";
}

//langkah 11 :
if(mysqli_query($jescdb,"update pengurus set
IDPengurus='$idpengurus' where IDPengurus='$idpengurusW' "))
{
    //langkah 11.1 :
    echo"<script>alert('Kemaskini BERJAYA!');
    window.location.href='senaraipengurusadmin.php';</script>";
}
else
{
    //langkah 11.2 :
    echo"<script>alert('Kemaskini TIDAK BERJAYA!.');
    window.history.back();</script>";
}

}
?>