<?php

session_start(); // mulai session
require('../../function.php'); // menyisipkan file funtion.php agar bisa digunakan fungsi2 yang ada di dalamnya
if(!isset($_SESSION['login'])){ // check jika user belum login
  header('location:../../index.php'); // alihkan ke index page
  exit;
}
if(isset($_POST['submit'])){ // check jika form sudah disubmit
  $nik = $_SESSION['nik']; // tanggap nik dari session dan masukkan ke variable $nik
  InputPengaduan($nik,$_POST); // jalankan fungsi InputPengaduan yang ada di file function.php dengan mengirimkan nik dan $_POST sebagai parameter 
}
require('../layouts/header.php'); // menyisipkan file header.php
?>
<main>
  <div>
    <h3>Buat pengaduan</h3>
  </div>
  <form action="" method="post" enctype="multipart/form-data">
    <label for="isi laporan">Isi Laporan</label>
    <textarea id="" cols="30" rows="10" name="isi" class="form-control" required></textarea> <br>
    <label for="isi laporan">Foto pendukung</label>
    <input type="file" name="gambar" accept="image/*" required> <br>
    <button type="submit" name="submit">
      submit
    </button>
    <a href="index.php">kembali</a>
  </form>
</main>
<?php require('../layouts/footer.php')  // menyisipkan file footer.php?>