<?php
    require('koneksi.php');
    session_start();
    if ( !isset($_SESSION['login'])){
        header("Location: login.php");
        exit;
    }
    $sesi = $_SESSION['id'];
    $sql_profile = mysqli_query($conn,"SELECT * FROM login WHERE id = '$sesi'") or die(mysqli_error($conn));
    $data = mysqli_fetch_array($sql_profile);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SingIt</title>
    <link rel="stylesheet" href="css/style_user.css?v9">
        
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
    <div class="Profilebody">
        <div class="profile"> 
            <img src="img/user.png" alt="">
            <div class="nama">
                <br>
            <h3>Nama : <?php echo $data['nama'] ?></h3>
            <h3>Username : <?php echo $data['username'] ?></h3>
            <a href="user_edit_profile.php?id=<?=$data['id'];?>" class="btn-edit">Edit Profile</a>
            </div>
            <br>
            
        </div>
        <div class="ContentPlace">
        <h1><?php echo $_SESSION['nama'] ?> Daftar Pesanan</h1>
        <table class="artis">
        <tr>
                    <th>Destinasi</th>
                    <th>Harga</th>
                    <th>Include</th>
                    <th>Syarat & Ketentuan</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            <tr>
            <?php 
                $lihatdata = mysqli_query($conn, "SELECT * FROM `pemesanan` WHERE `id_user` = '".$sesi."'");
                while($row1 = mysqli_fetch_array($lihatdata)){
                    $destinasi = $row1['id_destinasi'];
                    $query= "SELECT * FROM db_destinasi WHERE `id` = '".$destinasi."'";
                    $read = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($read)){
                ?>
                <td><?php echo $row['destinasi'] ?></td>
                    <td>Rp.<?php echo $row['harga'] ?>.-</td>
                    <td><?php echo $row['include'] ?></td>
                    <td><?php echo $row['syarat_ketentuan'] ?></td>
                    <td><img src="img/<?php echo $row['img']?>" alt=""></td>
                    <td><?php 
                        if ($row1['konfirmasi'] == 0){
                            echo "Menunggu Konfirmasi Admin";
                        }elseif($row1['konfirmasi'] == 3){
                            echo "Pesanan Dibatalkan";
                        }
                        else{
                            echo "Pesanan Terkonfirmasi";
                        };
                    ?></td>
                    <td>
                    <?php if($row1['konfirmasi'] == 0){
                        ?><a href="user_hapus_pesanan.php?id=<?=$row1['id'];?>" onclick="return hapus()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg></a>
                    <?php }?>
                    
                </td>
            </tr>
            <?php } }?>
        </table>
    </div>
        
    </div>
    <script src="js/script.js"></script>
    
</body>
</html>