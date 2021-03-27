<?php 
session_start(); // memulai session
require '../../function.php'; // menyisipkan file function.php agar bisa digunakan function2nya
$conn = DBConnection(); // panggil function DBConnection dan masukkan ke dalam vaiable $conn
  if(isset($_POST['submit'])){ // check apakah form input sudah di submit
     // dapatkan data dari inputan form  berupa username dan password
    $username = $_POST['username'];
    $password = $_POST['password'];
    $check = mysqli_query($conn,"SELECT * FROM petugas WHERE username = '$username'"); // Query ke database
    if(mysqli_num_rows($check) === 1){ // check jika ada user yang ditermukan atau yang sesuai
      $data = mysqli_fetch_assoc($check); // ubah menjadi array assosiative
        if($password == $data['password']){ // check passwordnya
          // buat session
          $_SESSION['login'] =true;
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;
          $_SESSION['id_petugas'] = $data['id_petugas'];
          $_SESSION['level'] = $data['level'];
          // alihkan ke index (yang ada dalam folder admin)
          header('location:index.php');
        }
    }
    $error = true;
  }
require('../layouts/header.php'); // menyisipkan file layout header 
?>
<?php if(isset($error)):?>
<div>username atau password anda salah</div>
<?php endif ;?>
<div>Login <strong>Petugas</strong></div>

<form method="post" action="">
  <div>
    <label for="inputEmail">username</label>
    <input type="text" id="inputEmail" class="form-control" placeholder="username" name="username" autofocus>
  </div>
  <div>
    <label for="inputPassword">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password">
  </div>
  <div>
    <button type="submit" name="submit">Login</button>
    <a href="../../index.php">Login Sebagai Masyarakat</a>
  </div>
</form>
<?php require('../layouts/footer.php')  // menyisipkan file layout header  ?>