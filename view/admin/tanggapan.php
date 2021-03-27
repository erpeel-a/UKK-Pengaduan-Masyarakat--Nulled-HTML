<?php
session_start();
require '../../function.php';
$conn = DBConnection();
  //simpan session username
 $name = $_SESSION['username'];

    //cek sesi
  if(!isset($_SESSION['login'])){


    header('location:../../index.php');
    exit;
  }
  //id petugas
$_idPetugas = $_SESSION['id_petugas'];
$_idPengaduan = $_SESSION['idpengaduan'];
// var_dump($_idPetugas);

// fech data pengadaun isi laporan
$pengaduan = FetchAllData("SELECT * FROM pengaduan WHERE id_pengaduan='$_idPengaduan'");


if(isset($_POST['submit'])){
  $tanggal = $_POST['tanggal'];
  $tanggapan = $_POST['tanggapan'];
  $tanggal = date('Y-m-d');
  // insert ke table tanggapan
  $sql = "INSERT INTO tanggapan(id_pengaduan,tgl_tanggapan,tanggapan,id_petugas) VALUES('$_idPengaduan','$tanggal','$tanggapan','$_idPetugas')";
  $execute_add_tanggapan = mysqli_query($conn, $sql); 
  $execute_update_pengaduan = mysqli_query($conn, "UPDATE pengaduan SET status ='selesai' WHERE id_pengaduan='$_idPengaduan'") or die(mysqli_error($conn));
  // update status tzable pengaduan;
  

  if($execute_update_pengaduan && $execute_add_tanggapan){
    echo "<script>
    alert('Tanggapan Berhasil Dikkirim');
        window.location.href = 'pengaduan.php'
    </script>";
  }else{
    echo "
    <script>
     alert('tanggapan gagal dikitim');
    </script>
    ";
  }
}
require('../layouts/header.php');
?>
<h2>Tulis Tanggapan</h2>
<form action="" method="post" enctype="multipart/form-data">
  <div>
    <label for="judul_pengaduan">Isi Pengaduan</label>
    <input type="text" readonly name="tanggal" value="<?= $pengaduan[0]['isi_laporan'] ?>">
  </div>
  <div>Tanggapan
    <label for="tanggapan"></label>
    <textarea name="tanggapan" id="" cols="30" rows="10"></textarea>
  </div>
  <button type="submit" name="submit">Kirim Tanggapan</button>
  <a href="index.php">Kembali</a>
</form>
<?php require('../layouts/footer.php'); ?>