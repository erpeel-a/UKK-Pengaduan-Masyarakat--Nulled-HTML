<?php 
session_start(); // mulai session
require('../../function.php'); // menyisipkan fle function.php
$conn = DBConnection(); // memanggil fungsi DBConnection dari file function.php
  if(isset($_POST['submit'])){ // cck jika tombol login sudah di submit
    //dapatkan data dari inputan form  berupa username dan password
    $username = $_POST['username'];
    $password = $_POST['password'];
    // query ke database
    $check = mysqli_query($conn,"SELECT * FROM masyarakat WHERE username = '$username'");
    //cek username
    if(mysqli_num_rows($check) === 1){ // check jika dalam query ada satu data yang ditemukan
      $data = mysqli_fetch_assoc($check); // ubah menjadi array assosiatif
        if($password == $data['password']){
          // create session
          $_SESSION['login'] = true;
          $_SESSION['nik'] = $data['nik'];
          $_SESSION['username'] = $data['username'];  
          $_SESSION['level'] = 'masyarakat';  
          // redirect ke halaman masyarakat index
          header('location:index.php');
          exit;
        }
    }
    // error
    $error = true;

  }
  require('../layouts/header.php');
?>

<?php if(isset($error)):?>
<div>username atau password anda salah</div>
<?php endif ;?>
<div>Login <strong>Masyarakat</strong></div>

<form method="post" action="">
  <div>
    <label for="inputEmail">username</label>
    <input type="text" id="inputEmail" placeholder="username" name="username" autofocus>
  </div>
  <div>
    <label for="inputPassword">Password</label>
    <input type="password" id="inputPassword" placeholder="Password" name="password">
  </div>
  <div>
    <button type="submit" name="submit">Login</button>
    <a href="<?= site_url ?>/view/masyarakat/registrasi.php">Registrasi</a>
    <a href="<?= site_url ?>/view/admin/login.php">Login Sebagai Petugas</a>
  </div>
</form>
<?php require('../layouts/footer.php') ?>