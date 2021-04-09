<?php
  session_start(); // mulai session
   require('../layouts/header.php');  //menyisipkan layout header 
   require '../../function.php'; // menyisipkan file function.php agar bisa di pakai function2 yang ada didalamnya
   isLogin();// panggil fungsi isLogin yang ada di file functions.php
   isPetugas(); //untuk mengecek apakah user dari table petugas yang login
 ?>
Dashboard
<p>Info user login : <b><?= $_SESSION['username'];?></b></p>
<!-- menu yang akan ditampilkan jika admin yang login -->
<?php if($_SESSION['level'] === 'admin') {?>
  <a href="registrasi.php">Registrasi Petugas</a>
  <a href="laporan.php">Cetak laporan </a>
<?php }?>
  <a href="pengaduan_selesai.php">Data Pengaduan Yang Ditanggapi</a>
  <a href="petugas.php">Data Petugas</a>
  <a href="Masyarakat.php">Data Masyarakat</a>
  <a href="pengaduan.php">Data Pengaduan</a>
  <a href="../logout.php">Logout</a>

<?php require('../layouts/footer.php') ?>