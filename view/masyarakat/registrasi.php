<?php
// terhubung file function.php->akses method-method;
require '../../function.php';
$conn = DBConnection();
  // submit true
if(isset($_POST['submit'])){
  if(daftar($_POST) > 0 ){
      header('Location:../../login.php');
  }else{
    // error
    echo mysqli_error($conn);
  }
}

require('../layouts/header.php');
?>
    <form  method="post" action="">
      <label for="nama" >nama</label>
      <input type="text" id="nama" placeholder="nama"  name="nama"required autofocus>

      <label for="username" >username</label>
      <input type="text" id="username" placeholder="username." required name="username" autofocus>

      <label for="nik" >nik</label>
      <input type="text" id="nama" placeholder="xxxxx"  name="nik"required autofocus>

      <label for="telephone" >telp</label>
      <input type="text" id="telephone" placeholder="08xxxxxxx" required name="telephone" autofocus>

      <label for="inputPassword" >Password</label>
      
      <input type="password" id="inputPassword" placeholder="Password" name="password" required>
       <label for="inputPassword" >Password</label>
      <input type="password" id="inputPassword agin" placeholder="Password" name="password2" required>
      <button type="submit" name="submit">submit</button>
    </form> 
<?php require('../layouts/footer.php'); ?>