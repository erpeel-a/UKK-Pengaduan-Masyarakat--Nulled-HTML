<?php
session_start();
require('../../function.php');
$conn = DBConnection();
  //simpan session username
  $name = $_SESSION['username'];

  //cek sesi
  if(!isset($_SESSION['login'])){
    header('location:login.php');
    exit;
  }
  //cek level 
  if($_SESSION['level'] != 'admin'){
    header('location:login.php');
  }
$laporan = FetchAllData("SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan=pengaduan.id_pengaduan INNER JOIN petugas ON petugas.id_petugas=tanggapan.id_petugas");

$site_url = ''; // Ganti URL sesuai dengan alamat local misal http://localhost/nama_folder
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
                <td><img src="<?= $site_url ?>/img/<?= $data['foto'] ;?>" width="200px" alt=""></td>
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
