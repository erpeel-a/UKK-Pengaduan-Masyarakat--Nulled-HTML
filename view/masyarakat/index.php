<?php

session_start();
if(!isset($_SESSION['login'])){


  header('location:../../index.php');
  exit;
}
if($_SESSION['level'] != ''){
  header('location:login.php');
  exit;
}
$username = $_SESSION['username'];
require('../layouts/header.php');
?>
Dashboard Home
<a href="tanggapan.php">Daftar Pengaduan yang ditanggapi</a>
<a href="report.php">Buat Laporan</a>
<a href="../logout.php">Logout</a>
<?php require('../layouts/footer.php'); ?>