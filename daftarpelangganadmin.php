<?PHP
include('header.php');

include('connect.php');

//Langkah 1 membuat kode otomatis idpelanggan:
$sql_id=mysqli_query($jescdb,"SELECT IDPelanggan
FROM pelanggan ORDER BY IDPelanggan DESC");

//langkah 2:
$data=mysqli_fetch_array($sql_id);
$kode=$data['IDPelanggan'];

//langkah 3:
$pembilang=substr($kode, 4, 3);
$tambah=(int)$pembilang + 1;

if(strlen($tambah)==1){
    $format="HP9700".$tambah;
}else if(strlen($tambah)==2){
    $format="HP970".$tambah;
}else{
    $format="HP97".$tambah;
}
?>

<h2>Borang Pendaftaran Pelanggan</h2>
<p style='color:#030303'>| <a href='menuutamaadmin.php' style='color:#009933'>Menu Utama</a> | 
<a href='senaraipelangganadmin.php' style='color:#009933'>Senarai Pelanggan</a> |</p>
<form method='POST' action=''>
    <table>
        
        <tr>
           <td bgcolor='#d1ffea' align='right'>ID Pelanggan:</td>
           <td><input type='text' name='IDPelanggan' size='30' value="<?PHP echo $format;?>" readonly></td>
        </tr>
        <tr>
           <td bgcolor='#dbffdc' align='right'>Nama Pelanggan:</td>
           <td><input type='text' name='NamaPelanggan' placeholder="e.g. Fatimah binti Ismail" size='30' required></td>
        </tr>
        <tr>
           <td bgcolor='#ebffd6' align='right'>No K/P:</td>
           <td>
           <input type='text' name='NoKP' required minlength='12' placeholder='Isi hanya 12 aksara sahaja' size='30' required>
           </td>
        </tr>
        <tr>
           <td bgcolor='#f5ffd6' align='right'>No Telefon:</td>
           <td>
           <input type='text' name='NoTel' required minlength='10' required maxlength='11' placeholder='e.g. 01123456789' size='30' onkeypress='return nomsahaja(event)' required>
           </td>
        </tr>
        <tr>
           <td bgcolor='#fffdda' align='right'>Katalaluan:</td>
           <td  class="inputBox">
           <input type='password' name='KataLaluan' required minlength='8' required maxlength='14' placeholder='Isi antara 8 hingga 14 aksara' id="password" size='30' required>
           <div id="toggle" onclick="showHide();"></div>
           </td>
        </tr>
        <tr>
        <td></td>
        </tr>
    </table>
    <div class="btn">
        <button id="setsemula" type="reset" class="color-btn">Set Semula</button>
        <button id="daftar" type="color" class="color-btn">Daftar</button>
    </div>
</form><br><br>
<?PHP include('footer.php');?>

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
        .btn{
            width: 380px;
            position: relative;
            margin-top: 30px;
            margin-bottom: 10px;
            background: #fff;
            padding: -20px;
            overflow: hidden;
        }
        .color-btn{
            width: 42%;
            padding: 10px 20px;
            cursor: pointer;
            display: block;
            margin: auto;
            background: linear-gradient(90deg, #ff105f,#ffad06,#03a9f4,#ff105f);
            background-size: 300%;
            border-radius: 30px;
            z-index: 1;
            border: 0;
            outline: none;
        }
        .color-btn:hover{
            animation: animate 6s linear infinite;  
        }
        @keyframes animate{
            0% {
                background-position: 0%;
            }
            100% {
                background-position: 400%;
            }
        }
        .color-btn:before{
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            z-index: -1;
            background: linear-gradient(90deg, #ff105f,#ffad06,#03a9f4,#ff105f);
            background-size: 300%;
            border-radius: 30px;
            opacity: 0;
            transition: 0.05s;
        }
        .color-btn:hover:before{
            filter: blur(20px);
            opacity: 1;
            animation: animate 8s linear infinite;
            z-index: -1;
        } 
        #setsemula{
            float: left;
            margin-left: 25px;
        }
        #daftar{
            float: right;
            margin-right: 25px;
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

<?PHP
//L2 : menguji data post
if(!empty($_POST))
    {
    //L3 : mengambil data post
    $id=$_POST['IDPelanggan'];
    $nama=$_POST['NamaPelanggan'];
    $notelefon=$_POST['NoTel'];
    $nokp=$_POST['NoKP'];
    $katalaluan=$_POST['KataLaluan'];


    //L4:memanggil fail connection
    include('connect.php');

  //Langkah 5:menukar bentuk data
    
    $id = mysqli_real_escape_string($jescdb,$id);
    $nama = mysqli_real_escape_string($jescdb,$nama);
    $notelefon = mysqli_real_escape_string($jescdb,$notelefon);
    $nokp = mysqli_real_escape_string($jescdb,$nokp);
    $katalaluan = mysqli_real_escape_string($jescdb,$katalaluan);

    //langkah 6:Menguji data 
    if(!is_numeric($nokp)){
        die("<script>alert('Terdapat Aksara di dalam NoKP anda!');
        window.history.back();</script>");
    }
    
    if(strlen($nokp)!=12) {
        die("<script>alert('Digit NoKP yang dimasukkan tidak tepat!');
        window.history.back();</script>");
    }
    
            {
                //langkah 7:masukkan data ke dalam pangkalan data
                if(mysqli_query($jescdb,"INSERT INTO pelanggan
                (IDPelanggan,NamaPelanggan,NoTel,NoKP,KataLaluan)
                VALUES ('$id','$nama','$notelefon','$nokp','$katalaluan')
                ")){
                    //langkah 7.1 :
                    echo "<script>
                    alert('Tahniah! Daftar pelanggan Berjaya!')
                    window.location.href='senaraipelangganadmin.php';
                    </script>";
                    }

                    else
                    {
                    //langkah 7.2:
                    echo "<script>
                    alert('Daftar pelanggan Gagal!')
                    window.history.back();
                    </script>";
                    }        
            }
    }
?>
