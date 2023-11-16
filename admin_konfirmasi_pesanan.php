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
            <h1 class = "head">KONFIRMASI PESANAN</h1><br>
            <h2>Admin JOURNEY</h2>
        </div>
        <div class="con">
        <table class="artis">
        <tr>
            <th>Nama Pemesan</th>
            <th>Destinasi</th>
            <th>Status</th>
            <th>Konfirmasi</th>
        </tr>
        <tr>
        <?php 
                $pesanan = mysqli_query($conn,"SELECT * FROM `pemesanan`");
                while($row = mysqli_fetch_array($pesanan)){
                    $id_destinasi = $row['id_destinasi'];
                    $id_user = $row['id_user'];
                    $sql_destinasi = mysqli_query($conn,"SELECT * FROM db_destinasi WHERE id = '$id_destinasi' ");
                    $sql_profile = mysqli_query($conn,"SELECT * FROM login WHERE id = '$id_user'");
                    while($destinasi = mysqli_fetch_array($sql_destinasi) and  $profile = mysqli_fetch_array($sql_profile)){
                        
                       
            ?>
        </tr>
        <tr>
            <td><?php echo $profile['nama'] ?></td>
            <td><?php echo $destinasi['destinasi'] ?></td>
            <td><?php if ($row['konfirmasi'] == 0){
                            echo "Belum di Konfirmasi";
                        }
                        elseif($row['konfirmasi'] == 3){
                            echo "DiBatalkan";
                        }
                        else{
                            echo "Terkonfirmasi";
                        }; ?></td>
            <td class="acc">
                <a href="admin_konfir.php?id=<?=$row['id'];?>" onclick="return konfirmasi()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>Konfirmasi</title><path d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z" /></svg>
                </a>
                <a href="admin_batal.php?id=<?=$row['id'];?>" onclick="return konfirmasi1()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>cancel</title><path d="M12 2C17.5 2 22 6.5 22 12S17.5 22 12 22 2 17.5 2 12 6.5 2 12 2M12 4C10.1 4 8.4 4.6 7.1 5.7L18.3 16.9C19.3 15.5 20 13.8 20 12C20 7.6 16.4 4 12 4M16.9 18.3L5.7 7.1C4.6 8.4 4 10.1 4 12C4 16.4 7.6 20 12 20C13.9 20 15.6 19.4 16.9 18.3Z" /></svg>
                </a>
                </td>
            </tr>
            <?php }}?>
        </table>
        </div>
    </div>
    <script src="js/script.js"></script>
    
</body>

</html>