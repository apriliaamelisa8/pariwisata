<?php
    require('koneksi.php');
    session_start();
    if ( !isset($_SESSION['login'])){
        header("Location: login.php");
        exit;
    }
?>

<?php
    if(isset($_GET['id'])){
        $id_user= $_GET['id'];
        $user = mysqli_query($conn, "SELECT * FROM login WHERE id = '".$id_user."' ");
        $row= mysqli_fetch_array($user);
    }

    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
    
        $sql_edit = mysqli_query($conn,"UPDATE `login` SET `nama`='".$nama."',`username`= '".$username."' WHERE `id` = ".$id_user." " );
        if($sql_upload_destinasi){
            echo '<script language = "javascript">
            alert("Data Berhasil Di Input") ;document.location = "user_data.php";</script>';    
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SingIt</title>
    <link rel="stylesheet" href="css/style_admin.css?v7">
        
</head>
<body >
<nav>
        <div class="logo">Visit Tour</div>
        <div class="nav-items">
           <li><a href="home.php">Home</a></li>
           <li><a href="#about">About</a></li>
           <li><a href="#menu">Menu</a></li>
           <li><a href="user_data.php">Pemesanan</a></li>
           <li><a href="logout.php">Logout</a></li>
        </div>
 
        <div class="darkLight-searchBox">
         <div class="dark-light">
             <i class='bx bx-moon moon'></i>
             <i class='bx bx-sun sun'></i>
         </div>
         </div>
     </nav>
    <div class= "bungkus">
        <div class="containerplay">
            <h2>Edit Data Profile</h2>
            <div class="play">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class = "form">
                        <label for="">Nama</label>
                        <input type="text" name="nama" value = "<?php 
                            echo $row['nama'];?>"><br>
                        <label for="">Username</label>
                        <input type="text" name="username" value = "<?php 
                            echo $row['username'];?>"><br>
                    
                    </div>
                    <div class = "form">
                    <button type="submit" name="submit"><b>Submit</b></button>
                    </div>
                    
                    
                    
                </form>
            </div>
        </div>
    </div>

</body>
</html>