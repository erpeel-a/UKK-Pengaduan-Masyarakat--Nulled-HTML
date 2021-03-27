<?php
  session_start();
 require('../layouts/header.php')  
 ?>
Dashboard
<p>Info user login : <b><?= $_SESSION['username'];?></b></p>
<?php if($_SESSION['level'] === 'admin') {?>
<a href="registrasi.php">Registrasi User</a>
<a href="pengaduan.php">Data Pengaduan</a>
<a href="Masyarakat.php">Data Masyarakat</a>
<a href="Petugas.php">Data petugas</a>
<a href="laporan.php">Cetak laporan </a>
<?php }else{ ?>
<a href="petugas.php">Data Masyarakat</a>
<a href="Masyarakat.php">Data petugas</a>
<a href="pengaduan.php">Data Pengaduan</a>
<?php } ?>
<a href="../logout.php">Logout</a>

<?php require('../layouts/footer.php') ?>