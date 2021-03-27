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

$petugas = FetchAllData("SELECT * FROM masyarakat");

require('../layouts/header.php');
?>
    <main role="main" >
      <div>
        <h1 >Daftar Masyarakat</h1>
      </div>
      
        <table border="2">
          <thead >
            <tr>
              <th>Nik</th>
              <th>Nama</th>
              <th>Username</th>
              <th>telp</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($petugas as $data) : ;?>
            <tr>
              <td><?= $data['nik'];?></td>
              <td><?= $data['nama'];?></td>
              <td><?= $data['username'];?></td>
              <td><?= $data['telp'];?></td>
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