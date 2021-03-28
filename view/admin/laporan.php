<?php
session_start(); // mulai session
require('../../function.php'); // menyisipkan file funtion.php agar bisa digunakan fungsi2 yang ada di dalamnya
$conn = DBConnection(); // panggil funsi DBConnection dan masukkan ke dalam variable  $conn
  if(!isset($_SESSION['login'])){ // cek jika user belum login
    header('location:login.php'); // alihkan ke login.php
    exit;
  }
  if($_SESSION['level'] != 'admin'){ // jika role petugas bukan admin 
    header('location:index.php'); // alihkan ke index.php (yang ada di folder admin)
  }
// tangkap data tanggapan dengan fungsi FetchAllData yang sudah didefinisikan di function.php untuk mengambil data yang dikirimkan sebagai parameter dan masukkan dalam vaiable $laporan
$laporan = FetchAllData("SELECT *  FROM tanggapan T1 INNER JOIN pengaduan P1 ON T1.id_pengaduan=P1.id_pengaduan INNER JOIN petugas P2 ON P2.id_petugas=T1.id_petugas")
?>
<?php require('../layouts/header.php')  ?>
          <h1>Cetak Laporan</h1>
        <a href="generate_report.php" >Cetak </a>
          <table border="2">
            <thead >
              <tr>
                <th>Pengaduan</th>
                <th>tanggal pengaduan</th>
                <th>foto</th>
                <th>tgl_tanggapan</th>
                <th>Tanggapan</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($laporan as $data) : ?>
              <tr>
                <td><?= $data['isi_laporan'];?></td>
                <td><?= $data['tanggapan'];?></td>
                <td><img src="<?= site_url ?>/img/<?= $data['foto'] ;?>" width="200px" alt=""></td>
                <td><?= $data['tgl_pengaduan'];?></td>
                <td><?= $data['tanggapan'];?></td>
              </tr>
              <?php endforeach ;?>
            </tbody>
          </table>
          <a href="index.php" >kembali</a>
        
<?php require('../layouts/footer.php') // menyisipkan file footer  ?>
