<?php 
// mulai sesi
session_start();
// hubungkan kehalam db koneksi;
require('function.php');

$conn = DBConnection();
// tombol submit ditekan 
  if(isset($_POST['submit'])){
    //dapatkan data dari inputan form 
    $username = $_POST['username'];
    $password = $_POST['password'];

    //get data 
    $acount = mysqli_query($conn,"SELECT * FROM masyarakat WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($acount) === 1){
      $data = mysqli_fetch_assoc($acount);
        if($password == $data['password']){

          // create session
          $_SESSION['login'] = true;
          $_SESSION['nik'] = $data['nik'];
          $_SESSION['level'] ='';
          $_SESSION['username'] = $data['username'];  
          //pindah halaman
          header('location:view/masyarakat/index.php');
          // stop code
          exit;
        }
    }
    // error
    $error = true;

  }else if(isset($_POST['regist'])){
    // kembali halaman registrasi
     header('location:view/masyarakat/registrasi.php');
  }
require('view/layouts/header.php')
?>

    <?php if(isset($error)):?>
    <div >username atau password anda salah</div>
    <?php endif ;?>
    <div >Login <strong>Masyarakat</strong></div>
      
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
              <button  type="submit" name="submit">Login</button>
              <a href="view/admin/login.php">Login Sebagai Petugas</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require('view/layouts/footer.php') ?>