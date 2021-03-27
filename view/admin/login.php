<?php 
session_start();
require('../../function.php');
$conn = DBConnection();
  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $check = mysqli_query($conn,"SELECT * FROM petugas WHERE username = '$username'");
    if(mysqli_num_rows($check) === 1){
      $data = mysqli_fetch_assoc($check);
        if($password == $data['password']){
          // create session
          $_SESSION['login'] =true;
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;
          $_SESSION['id_petugas'] = $data['id_petugas'];
          $_SESSION['level'] = $data['level'];
          header('location:index.php');
        }
    }
    $error = true;
  }else if(isset($_POST['regist'])){
     header('location:../registrasi.php');
  }

require('../layouts/header.php')
?>

    <?php if(isset($error)):?>
    <div >username atau password anda salah</div>
    <?php endif ;?>
    <div >Login <strong>Petugas</strong></div>
      
          <form  method="post" action="">
            <div >
              <label for="inputEmail" >username</label>
              <input type="text" id="inputEmail" class="form-control" placeholder="username" name="username" autofocus>
            </div>
            <div >
              <label for="inputPassword" >Password</label>
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password">
            </div>
            <div >
              <button type="submit" name="submit">Login</button>
              <a  href="../../index.php">Login Sebagai Masyarakat</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require('../layouts/footer.php') ?>