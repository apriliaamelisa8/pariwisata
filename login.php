<?php
    session_start();
    require('koneksi.php');

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = mysqli_query($conn,"SELECT * FROM login WHERE username = '$username'");
        $hitung = mysqli_num_rows($sql);
        $pw = mysqli_fetch_array($sql);
        $passwordsekarang = $pw['password'];

        if ($hitung > 0 ){
            //verifikasi password
            
            if($pw['username'] === "Admin" && $pw['password'] === "Admin123"){
                $_SESSION['login'] = true;
                echo '<script language = "javascript">
                alert("Anda Login Sebagai Admin"); document.location = "admin_home.php";</script>' ;
                
            }elseif(password_verify($password, $passwordsekarang) ){
                $_SESSION['login'] = true;
                $_SESSION['id'] = $pw['id'];
                $_SESSION['nama'] = $pw['nama'];
                echo '<script language = "javascript">
                alert("Anda berhasil login"); document.location = "home.php";</script>' ;
            // }
            }
            else{
                echo '<script language = "javascript">
                alert("Password salah"); document.location = "login.php";</script>' ;

            }
        }else{
            echo '<script language = "javascript">
            alert("Login Gagal"); document.location = "login.php";</script>' ;

        }
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style_login.css">
</head>

<body>
  <div class="bg">
    <div class="container">
    <form action=""method="POST" class="daftar-user">
                <p class="daftar-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                    <div class="input-group">
                        <input type="text" name="username"  placeholder="Username" required>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="input-group">
                        <button type="submit" name="login" class="btn"><b>Login</b></button>
                    </div>
                    <p class="login-register-text">Tidak Mempunyai Akun? <a href="register.php">Registrasi disini</a>.</p>
                </form>
    </div>
  </div>
</body>

</html>