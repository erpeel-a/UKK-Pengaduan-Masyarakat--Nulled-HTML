<?php
session_start(); // mulai session
require '../../function.php'; // menyisipkan file function.php agar bisa di pakai function2 yang ada didalamnya
$conn = DBConnection(); // panggil functio DBConnection dan masukkan ke dalam variable
  if(!isset($_SESSION['login'])){  // check jika user belum login
    header('location:../../index.php'); // alihkan ke halaman index page
    exit;
  }
$_idPetugas = $_SESSION['id_petugas']; // tangkap id_petugas dari session sudah ditambahakn/diset sebelumnya
$_idPengaduan = $_SESSION['idpengaduan']; // tangkap id_pengaduan dari session sudah ditambahakn/diset sebelumnya

$pengaduan = FetchAllData("SELECT * FROM pengaduan WHERE id_pengaduan='$_idPengaduan'"); // fungsi untuk mengambil data dari query yang dikirimkan


if(isset($_POST['submit'])){ // check jika tombol di submit
  // siapkan datanya
  $tanggal = $_POST['tanggal'];
  $tanggapan = $_POST['tanggapan'];
  $tanggal = date('Y-m-d');
  // insert ke table tanggapan
  $sql = "INSERT INTO tanggapan(id_pengaduan,tgl_tanggapan,tanggapan,id_petugas) VALUES('$_idPengaduan','$tanggal','$tanggapan','$_idPetugas')";
  $execute_add_tanggapan = mysqli_query($conn, $sql); 
  // ubah status pengaduan menjadi selesai
  $execute_update_pengaduan = mysqli_query($conn, "UPDATE pengaduan SET status ='selesai' WHERE id_pengaduan='$_idPengaduan'") or die(mysqli_error($conn));
  // cek jika kudua aksi tersebut berhasil 
  if($execute_update_pengaduan && $execute_add_tanggapan){
    echo "<script>
    alert('Tanggapan Berhasil Dikkirim');
        window.location.href = 'pengaduan.php'
    </script>";
    //tampilkan alert dan redirect ke halaman pengaduan.php
  }else{
     //jika salah maka muncul kan alert
    echo "
    <script>
     alert('tanggapan gagal dikitim');
    </script>
    ";
  }
}
require('../layouts/header.php'); //menyisipkan file layout header
?>
<h2>Tulis Tanggapan</h2>
<form action="" method="post" enctype="multipart/form-data">
  <div>
    <label for="judul_pengaduan">Isi Pengaduan</label>
    <!-- mengambil isi index pertama dari query SELECT * FROM pengaduan WHERE id_pengaduan='$_idPengaduan -->
    <input type="text" readonly name="tanggal" value="<?= $pengaduan[0]['isi_laporan'] ?>"> 
  </div>
  <div>Tanggapan
    <label for="tanggapan"></label>
    <textarea name="tanggapan" id="" cols="30" rows="10"></textarea>
  </div>
  <button type="submit" name="submit">Kirim Tanggapan</button>
  <a href="index.php">Kembali</a>
</form>
<!-- menyisipkan file layout header -->
<?php require('../layouts/footer.php'); ?>