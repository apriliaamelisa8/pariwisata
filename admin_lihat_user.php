<?php
    require('koneksi.php');
    session_start();
    if ( !isset($_SESSION['login'])){
        header("Location: login.php");
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SingIt</title>
    <link rel="stylesheet" href="css/style_admin_lihat_user.css?v5">
        
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
    <div class="ContentPlace">
        <h1>Daftar Data User</h1>
        <table >
            <tr>
                <th>Nama</th>
                <th>Username</th>
            </tr>
            
            <?php 
                $query= "SELECT * FROM login";

                $read = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($read)){
            ?>
            <tr>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['username'] ?></td>

            </tr>
            <?php } ?>
        </table>
    </div>   
    
</body>
</html>