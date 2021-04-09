<?php
session_start(); // mulai session
require '../../function.php'; // menyisipkan file function.php agar bisa di pakai function2 yang ada didalamnya
$conn = DBConnection(); // panggil functio DBConnection dan masukkan ke dalam variable $conn
isPetugas();
isLogin();// panggil fungsi isLogin yang ada di file functions.php
if(isset($_POST['verify'])){ // check jika tombol verify sudah di submit
  $idpengaduan = $_POST['verify']; // tanggap id pengaduan yang dikirim 
  $_SESSION['idpengaduan'] = $idpengaduan; // masukkan id pengaduan ke dalam session
  $cek = mysqli_query($conn, "UPDATE pengaduan SET status ='proses' WHERE id_pengaduan='$idpengaduan'") or die(mysqli_error($conn)); // query ke database
  header('location:tanggapan.php'); // alihkan ke page tanggapan.php
}
// tanggkap data pengaduan dengan fungsi FetchAllData yang sudah didefinisikan di function.php untuk mengambil data yang dikirimkan sebagai parameter dan masukkan dalam variable $pengaduan
  $pengaduan = FetchAllData("SELECT * FROM pengaduan");
  require('../layouts/header.php'); // menyisipkan file layout header
?>
<main role="main">
  <div>
    <h1 class="h2">Daftar Pengaduan :</h1>
  </div>
  <div>
    <table border="2">
      <thead>
        <tr>
          <th>tanggal</th>
          <th>isi laporan</th>
          <th>bukti</th>
          <th>status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($pengaduan as $data) :
        // check statusnya
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
          <td><?= $data['tgl_pengaduan'];?></td>
          <td><?= $data['isi_laporan'];?></td>
          <td><img src="<?= site_url ?>/img/<?= $data['foto'];?>" width="100px" alt=""></td>
          <td>
            <div><?= $status ;?></div>
          </td>
          <td>
          <?php if(!$status == 'selesai') {?>
            <form action="" method="post">
              <button value="<?= $data['id_pengaduan'] ;?>" type="submit" "
                    name=" verify">Verifikasi Data</button>
            </form>
            <?php }else{ ?>
              <p>Pengaduan Sudah Ditanggapi</p>
            <?php } ?>
          </td>
        </tr>
        <?php endforeach ;?>
      </tbody>
    </table>
    <a href="index.php">kembali</a>
  </div>
</main>
<!-- menyisipkan layout footer -->
<?php require('../layouts/footer.php'); ?>