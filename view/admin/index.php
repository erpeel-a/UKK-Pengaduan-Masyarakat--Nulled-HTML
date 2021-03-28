<?php
  session_start(); // mulai session
   require('../layouts/header.php');  //menyisipkan layout header 
   if(!isset($_SESSION['login'])){ // check jika user belum login
    header('location:../../index.php'); // alihkan ke index page / login
    exit;
  }
 ?>
Dashboard
<p>Info user login : <b><?= $_SESSION['username'];?></b></p>
<!-- menu yang akan ditampilkan jika admin yang login -->
<?php if($_SESSION['level'] === 'admin') {?>
  <a href="registrasi.php">Registrasi Petugas</a>
  <a href="laporan.php">Cetak laporan </a>
<?php }?>
  <a href="petugas.php">Data Petugas</a>
  <a href="Masyarakat.php">Data Masyarakat</a>
  <a href="pengaduan.php">Data Pengaduan</a>
  <a href="../logout.php">Logout</a>

<?php require('../layouts/footer.php') ?>