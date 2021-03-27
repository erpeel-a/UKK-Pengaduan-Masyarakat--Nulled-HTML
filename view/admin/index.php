<?php
  session_start(); // mulai sesion
   require('../layouts/header.php');  //menyisipkan layout header 
 ?>
Dashboard
<p>Info user login : <b><?= $_SESSION['username'];?></b></p>
<!-- menu yang akan ditampilkan jika admin login -->
<?php if($_SESSION['level'] === 'admin') {?>
  <a href="registrasi.php">Registrasi User</a>
  <a href="pengaduan.php">Data Pengaduan</a>
  <a href="Masyarakat.php">Data Masyarakat</a>
  <a href="petugas.php">Data petugas</a>
  <a href="laporan.php">Cetak laporan </a>
<?php }else{ ?>
<!-- menu yang akan ditampilkan jika petugas login -->
  <a href="petugas.php">Data Petugas</a>
  <a href="Masyarakat.php">Data Masyarakat</a>
  <a href="pengaduan.php">Data Pengaduan</a>
<?php } ?>
<a href="../logout.php">Logout</a>

<?php require('../layouts/footer.php') ?>