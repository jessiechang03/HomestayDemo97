<?PHP include('header.php');?>
<h2>Tempah Bilik</h2>
<p style='color:#030303'>| <a href='menuutamaadmin.php' style='color:#030303'>Menu Utama</a> | <a href ='senarailaporanadmin.php' style='color:#030303'>Senarai laporan</a> |</p>
<form method='POST' action=''>
    <table>
        <caption></caption>Sila Isikan Maklumat Anda.</caption>
        
        <tr>
           <td bgcolor='#84ffb4' align='right'>ID Pelanggan:</td>
           <td><input type='text' name='IDPelanggan' size='30' placeholder='Masukkan ID Pelanggan anda'>
           </td>
        </tr>

        <tr>
           <td bgcolor='#8bffcb' align='right'>Tarikh Daftar Masuk:</td>
           <td><input type='date' date_format="d/m/Y" name='TarikhDaftarMasuk' placeholder='Pilih tarikh anda datang' size='30'>
           </td>
        
        </tr>
        
        <tr>
           <td bgcolor='#96ffef' align='right'>Tarikh Daftar Keluar:</td>
           <td><input type='date' name='TarikhDaftarKeluar' placeholder='Pilih tarikh anda pulang' size='30'>
           </td>
        </tr>

    <tr>
    <td></td>
    <td>
            <input type='submit' value='Pilih bilik'>
            <input type='reset' value='Set semula'>
         </td>

    </tr>


    </table>

</form>
<?PHP include('footer.php');?>

<?PHP
//L2: menguji data post 
if(!empty($_POST))
    {
    //L3: mengambil data post 
    
    $idpelanggan=$_POST['IDPelanggan'];
    $tarikhdaftarmasuk=$_POST['TarikhDaftarMasuk'];
    $tarikhdaftarkeluar=$_POST['TarikhDaftarKeluar'];
    
    
    //L4:memanggil fail connection
    include('connect.php');
    
    //Langkah 5:menukar bentuk data 
    
      $idpelanggan = mysqli_real_escape_string($jescdb,$idpelanggan);
      $tarikhdaftarmasuk = mysqli_real_escape_string($jescdb,$tarikhdaftarmasuk);
      $tarikhdaftarkeluar = mysqli_real_escape_string($jescdb,$tarikhdaftarkeluar);

    //Langkah 7:masukkan data ke dalam pangkalan data 
    
        $_SESSION['IDPelanggan']=$idpelanggan;
        $_SESSION['TarikhDaftarMasuk']=$tarikhdaftarmasuk;
        $_SESSION['TarikhDaftarKeluar']=$tarikhdaftarkeluar;

        $sbmb = $jescdb->prepare("SELECT * from pelanggan where IDPelanggan = ?");
        $sbmb ->bind_param("s",$idpelanggan);
        $sbmb ->execute();
        $sbmb_result = $sbmb->get_result();
        if($sbmb_result->num_rows > 0){
            $data = $sbmb_result ->fetch_assoc();
        }else{
            echo"<script>window.alert('Sila Daftar IDPelanggan dahulu Jika Belum Daftar  ATAU  IDPelanggan yang dimasukkan Tidak Tepat!  ') 
            window.location.href='daftartempahan.php';</script>";
        }

         if(isset($_SESSION)){
         echo "<script>
            alert('Penempahan berjaya. Sila pilih bilik');
            window.location.href='pilihbilikadmin.php';
            </script>";   
         }
}
?>