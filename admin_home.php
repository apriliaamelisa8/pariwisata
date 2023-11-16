<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style_admin.css?6">
    <link rel="stylesheet"href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://font.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

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
            <h1 class = "head">DASHBOARD</h1><br>
            <h2>Admin JOURNEY</h2>
        </div>
        <div class="con">
            <a href="admin_lihat_user.php">
                <div class="user-con">
                    <h2>Data User</h2>
                    <img src="img/user.png" alt="user-icon" width=100px>
                </div>
            </a>
            <a href="admin_konfirmasi_pesanan.php">
                <div class="user-con">
                    <h2>Konfirmasi Pesanan</h2>
                    <img src="img/cek.png" alt="song-icon" width=100px>
                </div>
            </a>
            <a href="admin_lihat_data.php">
                <div class="user-con">
                    <h2>Data Destinasi</h2>
                    <img src="img/desti.png" alt="song-icon" width=100px>
                </div>
            </a>
        </div>
    </div>

    
</body>

</html>