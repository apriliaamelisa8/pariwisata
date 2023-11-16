<?php
    require('koneksi.php');
    session_start();
    if ( !isset($_SESSION['login'])){
        header("Location: login.php");
        exit;
    }
?>

<?php
    if(isset($_POST['submit'])){
        $destinasi = $_POST['destinasi'];
        $harga = $_POST['harga'];
        $include = $_POST['include'];
        $sk = $_POST['sk'];
        
        $gambar = $_FILES['foto']['name'];
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));

        $gambar_baru = "$destinasi.$ekstensi";
        $tmp = $_FILES['foto']['tmp_name'];
        
        
        if(move_uploaded_file($tmp, './img/' . $gambar_baru)){
            
            $sql_upload = mysqli_query($conn,"INSERT INTO `db_destinasi` (`id`, `destinasi`, `harga`, `include`, `syarat_ketentuan`, `img`) VALUES (NULL, '".$destinasi."', '".$harga."', '".$include."', '".$sk."', '".$gambar_baru."');");
            if($sql_upload){
                echo '<script language = "javascript">
                alert("Data Berhasil Di Input") </script>';    
            }
            else{
                echo '<script language = "javascript">
                alert("Data Gagal Di Input") </script>' ;    
            }
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
<nav class="Navigator">
    <div class="nav-items">
           <li><a href="admin_home.php">Home</a></li>
           <li><a href="admin_tambah_data.php">Tambah Data</a></li>
           <li><a href="admin_lihat_data.php">Data Destinasi</a></li>
           <li><a href="admin_lihat_user.php">Data User</a></li>
           <li><a href="logout.php">Logout</a></li>
        </div>

    </nav>
    <div class= "bungkus">
        <div class = "walcome">
            <h1 class = "head">Tambah Destinasi Baru</h1>
        </div>
        <div class="containerplay">
            <div class="play">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class = "form">
                        <label for="">Destinasi</label>
                        <input type="text" name="destinasi" required>   
                        <label for="">Harga</label>
                        <input type="text" name="harga" required>
                        <label for="">Include</label>
                        <textarea name="include" cols="30" rows="10">
                        </textarea>
                        <label for="">Syarat & Ketentuan</label>
                        <textarea name="sk" cols="30" rows="10">
                        </textarea>
                        <label for="">Gambar</label>
                        <input type="file" name="foto" require>
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