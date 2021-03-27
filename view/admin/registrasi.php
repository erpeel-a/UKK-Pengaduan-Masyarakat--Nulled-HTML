<?php
require '../../function.php';


if(isset($_POST['submit'])){
  if(registrasi($_POST) > 0){
    echo "<script>
      alert('user berhasil ditambahkan');
    </script>";
  }else{
    echo mysqli_error($conn);
  }
}

?>
<?php require('../layouts/header.php') ?>
  
            Registrasi
         
            <form method="post" action="">
              <div>
                <label for="nama">nama petugas</label>
                <input type="text" id="nama" placeholder="nama petugas" required name="namapetugas"
                  autofocus>
              </div>
              <div>
                <label for="username">username</label>
                <input type="text" id="username" placeholder="username" required name="username"
                  autofocus>
              </div>
              <div>
                <label for="telephone">Telephone</label>
                <input type="text" id="telephone" placeholder="08xxxxxxxx." required
                  name="telephone" autofocus>
              </div>
              <div>
                <select name="level" id="" class="form-control">
                  <option value="admin">admin</option>
                  <option value="petugas">petugas</option>
                </select>
              </div>
              <div>
                <label for="inputPassword">Password</label>
                <input type="password" id="inputPassword" placeholder="Password" name="password"
                  required>
              </div>
              <div>
                <label for="inputPassword">Konfirmasi Pasword</label>
                <input type="password" id="inputPassword" placeholder="Password entry"
                  name="passwords" required>
              </div>
              <button type="submit" name="submit">Register</button>
              <a  href="index.php">kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require('../layouts/footer.php') ?>