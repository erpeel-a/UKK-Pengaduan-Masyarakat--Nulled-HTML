<?php
session_start(); // mulai session
require('../../function.php'); // menyisipkan file funtion.php agar bisa digunakan fungsi2 yang ada di dalamnya
$conn = DBConnection(); // panggil funsi DBConnection dan masukkan ke dalam variable  $conn
isLogin();// panggil fungsi isLogin yang ada di file functions.php
isPetugas(); // mengecek apakah yang login dari table petugas
isRoleAdmin();
// tangkap data tanggapan dengan fungsi FetchAllData yang sudah didefinisikan di function.php untuk mengambil data yang dikirimkan sebagai parameter dan masukkan dalam vaiable $laporan
$laporan = FetchAllData("SELECT *  FROM pengaduan P1  INNER JOIN masyarakat M1 ON P1.nik=M1.nik WHERE NOT P1.status='0'");
// var_dump($laporan);
// echo json_encode($laporan)
?>
<?php require('../layouts/header.php')  ?>
<h1>Cetak Laporan</h1>
<a href="generate_report.php">Cetak </a>
<table border="2">
  <thead>
    <tr>
      <th>NIK Pelapor</th>
      <th>Nama Pelapor</th>
      <th>No Telp</th>
      <th>Isi Pengaduan</th>
      <th>tanggal pengaduan</th>
      <th>foto</th>
      <th>status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($laporan as $data) : 
      $status = $data['status'];
      if($status == '0'){ // jika status 0maka
        $status = 'terkirim'; // tampilakan "terkirim"
      }else if($status == 'proses'){ // jika status proses
        $status = 'diproses';// tampilakan "diproses"
      }else{
        $status = 'selesai'; // tampilkan selesai
      }
    ?>
    <tr>
      <td><?= $data['nik'];?></td>
      <td><?= $data['nama'];?></td>
      <td><?= $data['telp'];?></td>
      <td><?= $data['isi_laporan'];?></td>
      <td><?= $data['tgl_pengaduan'];?></td>
      <td><img src="<?= site_url ?>/img/<?= $data['foto'] ;?>" width="200px" alt=""></td>
      <td><?= $data['status'];?></td>
    </tr>
    <?php endforeach ;?>
  </tbody>
</table>
<a href="index.php">kembali</a>

<?php require('../layouts/footer.php') // menyisipkan file footer  ?>