<?PHP include('header.php');?>
<h2>Borang Log Masuk</h2>
<form method='POST' action='index.php'>
    <table>
        <caption></caption>Sila Masukkan Maklumat Anda</caption>
       <tr>
            <td bgcolor='#d1ffea' align='right'>ID :</td>
            <td><input type='text' name='IDPelanggan' placeholder='Isikan ID anda' size='30'>
            </td>            
        </tr>                                                                                                       
        <tr>
            <td bgcolor='#dbffdc' align='right'>Kata Laluan:</td>           
            <td class="inputBox">
            <input type='password' name='KataLaluan' required minlength='8' maxlength='14' placeholder='Isi antara 8 hingga 14 aksara' id="password" size='30'>
            <div id="toggle" onclick="showHide();"></div>
            </td>
        </tr>
        
        <tr>
            <td bgcolor='#ebffd6' align='right'>Tahap:</td>
            <td><select name="level">
                <option disabled selected value>Pilih</option>";
                <option>pelanggan</option>
                <option>pengurus</option>
                <option>admin</option>
                 </select>
            </td>
        </table>
    <div class="btn">
        <button id="Login" type="color" class="color-btn">Login</button>
    </div>
    <a href='daftarpelanggan.php'>Belum daftar?Daftar di sini</a>
</form>
<?PHP include('footer.php');?>
<style>
        h2{
            margin-top: 35px;
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
            width: 80%;
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
//L1:memanggil fail connection
include('connect.php');
//L2 : menguji data post
if(!empty($_POST))
    {
   //L3 : mengambil data post     
   $idpelanggan = $_POST["IDPelanggan"];
   $katalaluan = $_POST["KataLaluan"];
   $level = $_POST["level"];

    if($jescdb->connect_error){
        die("Penyambungan Gagal :".$jescdb->connect_error);
    } else {
        if($level == 'pelanggan'){
            $sbmb = $jescdb->prepare("SELECT * from pelanggan where IDPelanggan = ?");
            $sbmb ->bind_param("s",$idpelanggan);
            $sbmb ->execute();
            $sbmb_result = $sbmb->get_result();
            if($sbmb_result->num_rows > 0){
                $data = $sbmb_result ->fetch_assoc();
                if($data['KataLaluan'] === $katalaluan){
                    $_SESSION["nama"] = $data['NamaPelanggan'];  
                    $_SESSION["IDPelanggan"] = $data['IDPelanggan'];  
                    if(isset ($_SESSION["nama"])){
                        echo "<script>alert('Log Masuk Berjaya!')
                        window.location.href='menuutamapelanggan.php';</script>";}
                }else{
                    echo"<script>window.alert('KataLaluan Anda TIDAK TEPAT!') 
                    window.location.href='index.php';</script>";
                }
            }else{
                echo"<script>window.alert('IDPelanggan Anda TIDAK TEPAT!') 
                window.location.href='index.php';</script>";
            }
        }if($level=='pengurus'){
            $sbmb = $jescdb->prepare("SELECT * from pengurus where IDPengurus = ?");
            $sbmb ->bind_param("s",$idpelanggan);
            $sbmb ->execute();
            $sbmb_result = $sbmb->get_result();
            if($sbmb_result->num_rows > 0){
                $data = $sbmb_result ->fetch_assoc();
                if($data['KataLaluan'] === $katalaluan){
                    $_SESSION["nama"] = $data['NamaPengurus'];
                    $_SESSION["IDPengurus"] = $data['IDPengurus']; 
                    echo "<script>alert('Log Masuk Berjaya!')
                    window.location.href='menuutamapengurus.php';</script>";
                }else{
                    echo"<script>window.alert('KataLaluan Anda TIDAK TEPAT!') 
                    window.location.href='index.php';</script>";
                }
            }else{
                echo"<script>window.alert('IDPengurus Anda TIDAK TEPAT!') 
                window.location.href='index.php';</script>";
            }
        }if($level=='admin'){
            $sbmb = $jescdb->prepare("SELECT * from admin where IDAdmin = ?");
            $sbmb ->bind_param("s",$idpelanggan);
            $sbmb ->execute();
            $sbmb_result = $sbmb->get_result();
            if($sbmb_result->num_rows > 0){
                $data = $sbmb_result ->fetch_assoc();
                if($data['KataLaluan'] === $katalaluan){
                    $_SESSION["nama"] = $data['NamaAdmin'];
                    $_SESSION["IDAdmin"] = $data['IDAdmin']; 
                    echo "<script>alert('Log Masuk Berjaya!')
                    window.location.href='menuutamaadmin.php';</script>";
                }else{
                    echo"<script>window.alert('KataLaluan Anda TIDAK TEPAT!') 
                    window.location.href='index.php';</script>";
                }
            }else{
                echo"<script>window.alert('IDAdmin Anda TIDAK TEPAT!') 
                window.location.href='index.php';</script>";
            }
        }else{
             echo"<script>window.alert('Sila Pilih Tahap Anda')
             window.history.back()</script>";
        }
    }
    }
?>
