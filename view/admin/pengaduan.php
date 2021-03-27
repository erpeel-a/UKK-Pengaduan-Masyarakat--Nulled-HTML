<?php
session_start();

require('../../function.php');
$conn = DBConnection();
 $name = $_SESSION['username'];
if(!isset($_SESSION['login'])){
  header('location:../../index.php');
  exit;
}
if(isset($_POST['verify'])){
  $idpengaduan = $_POST['verify'];
  // var_dump($idpengaduan);
  $_SESSION['idpengaduan'] = $idpengaduan;
  $cek = mysqli_query($conn, "UPDATE pengaduan SET status ='proses' WHERE id_pengaduan='$idpengaduan'") or die(mysqli_error($conn));
  header('location:tanggapan.php');
}
  $pengaduan = FetchAllData("SELECT * FROM pengaduan");
  require('../layouts/header.php');
?>

    <main role="main" >
      <div>
        <h1 class="h2">Daftar Pengaduan :</h1>
      </div>
      <div >
        <table border="2">
          <thead >
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
             $status = $data['status'];
             if($status == '0'){
               $status = 'terkirim';
             }else if($status == 'proses'){
               $status = 'diproses';
             }else{
               $status = 'diterima';
             }
 
            ?>
            <tr>
              <td><?= $data['tgl_pengaduan'];?></td>
              <td><?= $data['isi_laporan'];?></td>
              <td><img src="../../img/<?= $data['foto'];?>" width="50px" alt=""></td>
              <td>
                <div ><?= $status ;?></div>
              </td>
              <td>
                <form action="" method="post">
                  <button value="<?= $data['id_pengaduan'] ;?>" type="submit" "
                    name="verify">Verifikasi Data</button>
                </form>
              </td>
            </tr>
            <?php endforeach ;?>
          </tbody>
        </table>
        <a href="index.php" >kembali</a>
      </div>
    </main>
  </div>
</div>
<?php require('../layouts/footer.php'); ?>