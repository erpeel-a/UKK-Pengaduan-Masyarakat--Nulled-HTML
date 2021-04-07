<?php
session_start();
require '../../function.php'; //menyisipkan file function
isLogin();
require('../layouts/header.php'); // menyisipkan file layuot header.php
?>
  Dashboard Home <br> info user login <strong><?= $_SESSION['username'] ?></strong>
  <a href="tanggapan.php">Daftar Pengaduan yang ditanggapi</a>
  <a href="input_pengaduan.php">Buat Laporan</a>
  <a href="../logout.php">Logout</a>
<?php require('../layouts/footer.php'); // menyisipkan file layuot footer.php ?>