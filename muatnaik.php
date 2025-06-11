<?PHP
include('header.php');
//menyediakan form untuk upload
echo"
<br>
<h2>Muat Naik Tempahan</h2>
<p style='color:#030303'>| <a href='menuutamaadmin.php' style='color:#009933'>Menu Utama</a> |</p><br>
<form  name='form1' id='form1' method='POST' action='muatnaik.php' 
enctype='multipart/form-data'> 
  Pilih Fail CSV untuk di import :
  <input type='file' name='file' required/>
  <button type='submit' name='btn-upload'>Muat Naik</button>
</form>

<table width='40%'>
  <tr><br><br>
        <td align='center'>Untuk proses mengimport data tempahan, pastikan anda menggunakan template yang 
        telah disediakan. <a href='laporan.csv'>Muat turun</a> di sini.
        </td>
  </tr>
</table>

";

//menyemak samada terdapat fail yang dihantar melalui post. ini bertujuan bagi mengelakkan
//ralat pada kali pertama fail import dibuka.
if (isset($_POST['btn-upload'])){
//membuat connection kepada pangkalan data kerana akan menggunakan statement SQL
include('connect.php');

//lokasi sementara fail yang ingin diupload
$namafailsementara=$_FILES["file"]["tmp_name"];

//mengambil nama fail yang dihantar	
$namafail = $_FILES['file']['name'];
//mengambil format fail dari nama fail di atas
$jenisfail = pathinfo($namafail,PATHINFO_EXTENSION);

//menguji jika fail yang diupload tidak kosong dan berformat csv
if($_FILES["file"]["size"] > 0 AND $jenisfail=="csv")
     {
        //arahan untuk membaca fail yang diupload
        $failyangdataingindiupload = fopen($namafailsementara, "r");
        //membaca fail yang diupload cell demi cell.
        //setiap cell hanya dibenarkan 10000 aksara sahaja. jika lebih, ia akan
        //mengganggap itu cell yang berikutnya
        $counter=1;
        while (($getData = fgetcsv($failyangdataingindiupload, 10000, ",")) !== FALSE)
         {
            
           
            if ($counter>1){
            //memasukkan data ke dalam pangkalan data satu demi satu 
            $result = mysqli_query($jescdb, "INSERT into tempahan
            (IDTempahan,IDPelanggan,IDPengurus,NoBilik,TarikhDaftarMasuk,TarikhDaftarKeluar,JumlahHarga) 
            values 
            ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."')
            ");
            //memaklumkan kepada pengguna yang data telah diupload 
            //dan kembali ke page import
           echo "<script>alert('Muat naik fail data tempahan berjaya.');
                window.location.href = 'senarailaporanadmin.php';</script>";
            }
            $counter++;
              } //tutup while
             
            fclose($failyangdataingindiupload);	
            
     }//tutup if fail tidak kosong dan berformat csv 

//jika fail bukan berformat csv, kembali ke fail import
else
echo"<script>alert('Hanya fail berformat CSV sahaja dibenarkan'); </script>";
} // tutup if isset
include('footer.php');
?>