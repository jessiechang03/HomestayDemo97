<?PHP include('header.php');?>
<h2>Tempah Bilik</h2>
<p style='color:#030303'>| <a href='menuutamapelanggan.php' style='color:#030303'>Menu Utama</a> | 
<form method='POST' action=''>
    <table>
        <caption></caption>Sila Isikan Maklumat Anda.</caption>
        
        <tr>
           <td bgcolor='#84ffb4' align='right'>Tarikh Daftar Masuk:</td>
           <td><input type='date' name='TarikhDaftarMasuk' placeholder='Pilih tarikh anda datang' size='30'>
           </td>
        
        </tr>
        
        <tr>
           <td bgcolor='#8bffcb' align='right'>Tarikh Daftar Keluar:</td>
           <td><input type='date' name='TarikhDaftarKeluar' placeholder='Pilih tarikh anda pulang' size='30'>
           </td>
        </tr>

    <tr>
    <td></td>
    <td>
            <input type='submit' value='Daftar'>
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
    $tarikhdaftarmasuk=$_POST['TarikhDaftarMasuk'];
    $tarikhdaftarkeluar=$_POST['TarikhDaftarKeluar'];
    
    
    //L4:memanggil fail connection
    include('connect.php');
    
    //Langkah 5:menukar bentuk data 
      $tarikhdaftarmasuk = mysqli_real_escape_string($jescdb,$tarikhdaftarmasuk);
      $tarikhdaftarkeluar = mysqli_real_escape_string($jescdb,$tarikhdaftarkeluar);

    //Langkah 7:masukkan data ke dalam pangkalan data 
        $_SESSION['TarikhDaftarMasuk']=$tarikhdaftarmasuk;
        $_SESSION['TarikhDaftarKeluar']=$tarikhdaftarkeluar;

if(isset($_SESSION)){
     echo "<script>
        alert('Penempahan berjaya. Sila pilih bilik');
        window.location.href='pilihbilik.php';
        </script>";   
}
}
?>