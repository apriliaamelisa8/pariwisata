<?php
    require('koneksi.php');
    
    if(isset($_POST['daftar'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_com = $_POST['password_com'];
        if ($password === $password_com){
            $epassword = password_hash($password, PASSWORD_DEFAULT);
            
            // cek username
            $hasil = mysqli_query($conn, "SELECT username FROM login WHERE username = '$username'");
            if(mysqli_fetch_assoc($hasil)){
                echo '<script language = "javascript">
                alert("Username telah digunakan"); document.location = "register.php";</script>' ;
            }else{
                $sql = mysqli_query($conn,"INSERT INTO login(nama, username, password) VALUES ('$nama','$username','$epassword')");
                if ($sql){
                    echo '<script language = "javascript">
                    alert("Daftar Berhasil"); document.location = "index.php";</script>' ;
                    
                }else{
                    echo '<script language = "javascript">
                    alert("Daftar Gagal"); document.location = "index.php";</script>' ;
                }
            }
        }else{
            echo '<script language = "javascript">
            alert("Password Tidak Sama"); document.location = "register.php";</script>' ;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/style_login.css">
</head>

<body>
  <div class="bg">
    <div class="container">
    <form action=""method="POST" class="daftar-user">
                <p class="daftar-text" style="font-size: 2rem; font-weight: 800;">Register</p>    
                    <div class="input-group">
                        <input type="text" name="nama" placeholder="Nama" required>
                    </div>
                    <div class="input-group">
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password_com" placeholder="Confirmasi Password" required>
                    </div>
                    <div class="input-group">
                        <button type="submit" name="daftar" class="btn" ><b>Daftar</b></button>
                    </div>
                    <p class="login-register-text">Mempunyai Akun? <a href="login.php">Login disini</a>.</p>
                </form>
    </div>
  </div>
</body>

</html>