<?php
require '../../function.php'; // menyisipkan file function.php agar bisa di pakai function2 yang ada didalamnya
if(isset($_POST['submit'])){ // check jika tombol form sudah disubmit
  if(PetugasRegister($_POST) > 0){ // masukkan data input ke fungsi PetugasRegister dari file function.php dan check jika data yang masuk tidak 0 / lebih dari 0
    echo "<script>
      alert('Registrasi berhasil');
    </script>";
    // maka munculkan alert
  }else{
    // maka munculkan error dari koneksi
    echo mysqli_error($conn);
  }
}
require('../layouts/header.php') // menyisipkan file layout header
?>
Registrasi
<form method="post" action="">
  <div>
    <label for="nama">nama petugas</label>
    <input type="text" id="nama" placeholder="nama petugas" required name="namapetugas" autofocus> <br>
  </div>
  <div>
    <label for="username">username</label>
    <input type="text" id="username" placeholder="username" required name="username" autofocus> <br>
  </div>
  <div>
    <label for="telephone">Telephone</label>
    <input type="text" id="telephone" placeholder="08xxxxxxxx." required name="telephone" autofocus> <br>
  </div>
  <div>
    <label for="">Role</label>
    <select name="level" id="" class="form-control">
      <option value="admin">admin</option>
      <option value="petugas">petugas</option>
    </select>
  </div> <br>
  <div>
    <label for="inputPassword">Password</label>
    <input type="password" id="inputPassword" placeholder="Password" name="password" required>
  </div>
  <div>
    <br>
    <label for="inputPassword">Konfirmasi Pasword</label>
    <input type="password" id="inputPassword" placeholder="konfirmasi password" name="konfirmasi_password" required>
  </div>
  <button type="submit" name="submit">Register</button>
  <a href="index.php">kembali</a>
</form>

<?php require('../layouts/footer.php')  // menyisipkan file layout footer?>