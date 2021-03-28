<?php
session_start(); // mulai session
require('../../function.php'); // menyisipkan file funtion.php agar bisa digunakan fungsi2 yang ada di dalamnya
$conn = DBConnection();
if(!isset($_SESSION['login'])){ // check jika user belum login
  header('location:../../index.php'); // alihkan ke index page
  exit;
}
// tanggkap data tanggapan yang di join dengan table pengaduan, petugas dan masyarakat dengan fungsi FetchAllData yang sudah didefinisikan di function.php untuk mengambil data yang dikirimkan sebagai parameter dan masukkan dalam variable $pengaduan
$pengaduan = FetchAllData("SELECT * FROM tanggapan T1 INNER JOIN pengaduan P1 ON T1.id_pengaduan=P1.id_pengaduan INNER JOIN petugas P2 ON P2.id_petugas=T1.id_petugas INNER JOIN masyarakat M1 ON P1.nik=M1.nik");

require('../layouts/header.php'); // menyisipkan layout header
?>
<h1 class="h2">Daftar Pengaduan :</h1>
<table border="2">
  <thead>
    <tr>
      <th>Nama Pelapor</th>
      <th>Tanggal Pengaduan</th>
      <th>isi laporan</th>
      <th>bukti</th>
      <th>tanggapan</th>
      <th>tanggal tanggapan</th>
      <th>Petugas</th>
      <th>status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($pengaduan as $item) : 

            $status = $item['status'];
            if($status == '0'){
              $status = 'terkirim';
            }else if($status == 'proses'){
              $status = 'diproses';
            }else{
              $status = 'selesai';
            }
            ?>
    <tr>
      <td><?= $item['nama'];?></td>
      <td><?= $item['tgl_pengaduan'];?></td>
      <td><?= $item['isi_laporan'];?></td>
      <td><img src="<?= site_url ?>/img/<?= $item['foto'];?>" width="100px" alt=""></td>
      <td><?= $item['tanggapan'];?></td>
      <td><?= $item['tgl_tanggapan'];?></td>
      <td><?= $item['nama_petugas'] ?></td>
      <td>
        <div><?= $status ;?></div>
      </td>
    </tr>
    <?php endforeach ;?>
  </tbody>
</table>
<a href="index.php">kembali</a>
<?php require('../layouts/footer.php');  // menyisipkan layout footer?>