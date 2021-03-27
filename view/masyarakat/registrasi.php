<?php
require '../../function.php'; // menyisipkan file function.php agar bisa digunakan function2nya
$conn = DBConnection(); // panggil function DBConnection dan masukkan ke dalam vaiable $conn
if(isset($_POST['submit'])){ // chek apakah form sudah di submit
  if(MasyarakatRegister($_POST) > 0 ){ // masukkan data dari $_POST ke fungsi MasyarakatRegister (yang ada di file function) dan check jika data masuk / lebih dari 0
    echo "<script>
        alert('Registrasi berhasil');
      </script>";
  }else{
    echo mysqli_error($conn); // jika error tampilkan error
  }
}
require('../layouts/header.php'); // menyisipkan file header.php
?>
    <form  method="post" action="">
      <label for="nama" >nama</label>
      <input type="text" id="nama" placeholder="nama"  name="nama"required autofocus> <br>

      <label for="username" >username</label>
      <input type="text" id="username" placeholder="username." required name="username" autofocus> <br>

      <label for="nik" >nik</label>
      <input type="number" id="nama" placeholder="xxxxx" name="nik"required autofocus><br>

      <label for="telephone" >telp</label>
      <input type="number" id="telephone" placeholder="08xxxxxxx" required name="telephone" autofocus><br>

      <label for="inputPassword" >Password</label>
      
      <input type="password" id="inputPassword" placeholder="Password" name="password" required><br>
       <label for="inputPassword" >Password</label>
      <input type="password" id="inputPassword agin" placeholder="Password" name="konfirmasi_password" required><br>
      <button type="submit" name="submit">Registrasi</button>
      <a href="<?= site_url ?>/index.php" >kembali</a>
    </form> 
<?php require('../layouts/footer.php'); // menyisipkan file footer.php ?>
