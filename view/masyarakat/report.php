<?php
require '../../function.php';
session_start();
if(!isset($_SESSION['login'])){
  header('location:../../index.php');
  exit;
}
if(isset($_POST['submit'])){
  $nik = $_SESSION['nik'];
  tanggapan($nik,$_POST);
}

require('../layouts/header.php');

?>

<main>
  <div>
    <h3>Buat pengaduan</h3>
  </div>
  <form action="" method="post" enctype="multipart/form-data">
    <label for="isi laporan">Isi Laporan</label>
    <textarea id="" cols="30" rows="10" name="isi" class="form-control" required></textarea>
    <label for="isi laporan">Foto pendukung</label>
    <input type="file" name="gambar" accept="image/*" required>
    <button type="submit" name="submit">
      submit
    </button>
    <a href="index.php">kembali</a>
  </form>
</main>
<?php require('../layouts/footer.php') ?>