<?php
session_start(); // memulai session
require '../../function.php'; // menyisipkan file function.php agar bisa digunakan function2nya
$conn = DBConnection(); // panggil function DBConnection dari file function.php
  if(!isset($_SESSION['login'])){ // cek jika jika user belum login
    header('location:../../index.php'); // alihkan ke halaman index page
    exit;
  }
  // tanggkap data petugas dengan fungsi FetchAllData yang sudah didefinisikan di function.php untuk mengambil data yang dikirimkan sebagai parameter dan masukkan dalam variable $petugas
$petugas = FetchAllData("SELECT * FROM petugas"); 

require('../layouts/header.php');
?>
    <main role="main" >
      <div>
        <h1 >Daftar Petugas</h1>
      </div>
        <table border="2">
          <thead >
            <tr>
              <th>Nama Petugas</th>
              <th>username</th>
              <th>No Telp</th>
              <th>level</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($petugas as $data) : ;?>
            <tr>
              <td><?= $data['nama_petugas'];?></td>
              <td><?= $data['username'];?></td>
              <td><?= $data['telp'];?></td>
              <td><?= $data['level'];?></td>
            </tr>
            <?php endforeach ;?>
          </tbody>
        </table>
        <a href="index.php" >kembali</a>
      </div>
    </main>
<?php require('../layouts/footer.php'); ?>