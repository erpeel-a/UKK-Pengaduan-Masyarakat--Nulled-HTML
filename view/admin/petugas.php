<?php
session_start();
require '../../function.php';
$conn = DBConnection();
  //simpan session username
  $name = $_SESSION['username'];

  //cek sudahkah login
  if(!isset($_SESSION['login'])){
    header('location:../../index.php');
    exit;
  }

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
  </div>
</div>  
<?php require('../layouts/footer.php'); ?>