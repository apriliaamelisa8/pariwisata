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
        $id_destinasi= $_GET['id'];
        $hasil_destinasi = mysqli_query($conn, "SELECT * FROM db_destinasi WHERE id = '".$id_destinasi."' ");
        $row_destinasi = mysqli_fetch_array($hasil_destinasi);
    }

    if(isset($_POST['submit'])){
        $destinasi = $_POST['destinasi'];
        $harga = $_POST['harga'];
        $include = $_POST['include'];
        $sk = $_POST['sk'];
    
        $sql_upload_destinasi = mysqli_query($conn,"UPDATE `db_destinasi` SET `destinasi`='".$destinasi."',`harga`= '".$harga."',`include`='".$include."',`syarat_ketentuan`='".$sk."' WHERE `id` = '".$id_destinasi."'");
        if($sql_upload_destinasi){
            echo '<script language = "javascript">
            alert("Data Berhasil Di Input") ;document.location = "admin_lihat_data.php";</script>';    
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
           <li><a href="#home">Home</a></li>
           <li><a href="#about">About</a></li>
           <li><a href="#menu">Menu</a></li>
           <li><a href="login.php">Pemesanan</a></li>
           <li><a href="logout.php">Logout</a></li>
        </div>

    </nav>
    <div class= "bungkus">
        <div class="containerplay">
            <h2>Edit Data lagu</h2>
            <div class="play">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class = "form">
                        <label for="">Destinasi</label>
                        <input type="text" name="destinasi" value = "<?php 
                            echo $row_destinasi['destinasi'];?>"><br>
                        <label for="">Harga</label>
                        <input type="text" name="harga" value = "<?php 
                            echo $row_destinasi['harga'];?>"><br>
                        <label for="">Include</label>
                        <textarea name="include" cols="30" rows="10">
                        <?php 
                            echo $row_destinasi['include'];?>
                        </textarea><br>
                        <label for="">Destinasi</label>
                        <textarea name="sk" cols="30" rows="10">
                            <?php 
                            echo $row_destinasi['syarat_ketentuan'];?>
                        </textarea><br>
                    
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