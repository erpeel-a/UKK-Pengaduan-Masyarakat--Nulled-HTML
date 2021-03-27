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
$laporan = FetchAllData("SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan=pengaduan.id_pengaduan INNER JOIN petugas ON petugas.id_petugas=tanggapan.id_petugas");

?>
<?php require('../layouts/header.php')  ?>

          Cetak Laporan
        
        <a href="generate_report.php" >Cetak </a>
          
          <table border="2">
            <thead >
              <tr>
                <th>Pengaduan</th>
                <th>tanggal pengaduan</th>
                <th>foto</th>
                <th>tgl_tanggapan</th>
                <th>Tanggapan</th>
                <th>Aksi</th>
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
                <td>  
                  
                </td>
              </tr>
              <?php endforeach ;?>
            </tbody>
          </table>
          </div>
          <a href="index.php" >kembali</a>
        
<?php require('../layouts/footer.php')  ?>
