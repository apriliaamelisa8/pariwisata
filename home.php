<?php   
    include "koneksi.php";
    if (isset($_GET['cari'])){
        $pencarian= $_GET['cari'];
        $query = "SELECT * FROM db_destinasi WHERE destinasi LIKE '%".$pencarian."%'";  
    }else{
        $query= "SELECT * FROM db_destinasi";
    }
    
    // $read = mysqli_query($conn, $query);
    // $row = mysqli_fetch_assoc($read)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css?8">
    <link rel="stylesheet"href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://font.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

</head>
<body>
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

    <!--Menu Section-->
    <br><br><br>
    <section class="menu">
        <div class="heading">
            <span>Top</span>
            <h2>Destinasi</h2>
        </div>
       
        <div class="menu-container">
            <!-- Book 1 -->
             <?php 
                    $read = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($read)){
                        if($row['id'] == 11 or $row['id'] == 12 or $row['id'] == 13or $row['id'] == 14){
                ?>
            <div class="box">
                <div class="box-img">
                    <img src="img/<?php echo $row['img']?>" alt="Bumi Book"width="250px" height="370px">
                </div>
                <div class="box-content">
                    <h2>Rekomendasi</h2>
                    <h3><?php echo $row['destinasi'] ?></h3>
                    <a href="user_konfirmasi_pesanan.php?id=<?=$row['id'];?>"  onclick="return pesan()">
                        <div class="btn">Order</div>
                            
                        </a>
                </div>
            </div>
            <?php }}?>
    </section>

    <!-- Menu Section 2-->
    
    <section class="menu" >
    <div class = "kotak">
            <form class="box-cari" method= "get" action="">
                <input type="text" placeholder= "Cari Destinasi ..." name="cari" value="<?php if(isset($_GET['cari'])){echo $_GET['cari'];} ?>">
                <br>
                <button type="submit"><img src="img/cari.png"></button>
            </form>  
        </div>
    <div class="heading" id="menu">
            <span>Daftar</span>
            <h1>Destinasi</h1>
        </div>
    <div class = "table" style = "overflow-x : auto;">
            <table>
                <tr>
                    <th>Destinasi</th>
                    <th>Harga</th>
                    <th>Include</th>
                    <th>Syarat & Ketentuan</th>
                    <th>Gambar</th>
                    <th></th>
                </tr>
                
                <?php 
                    $read = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($read)){
                ?>
                <tr>
                    <td><?php echo $row['destinasi'] ?></td>
                    <td>Rp.<?php echo $row['harga'] ?>.-</td>
                    <td><?php echo $row['include'] ?></td>
                    <td><?php echo $row['syarat_ketentuan'] ?></td>
                    <td><img src="img/<?php echo $row['img']?>" alt=""></td>
                    <td>
                        <a href="user_konfirmasi_pesanan.php?id=<?=$row['id'];?>"  onclick="return pesan()">
                        <div class="btn">Order</div>
                            
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

    </section>

    <!--About Section-->
    <section class="about" id="about">
    <div class="logo">Visit Tour</div>
        <div class="about-text">
        <span>About Us</span>
        <h2>Hello, Visiter</h2>
        <p>Selamat datang di Visit Tours! pencinta petualangan yang penuh semangat. Kami adalah tim yang berkomitmen untuk memberikan pengalaman perjalanan tak terlupakan melalui paket tour eksklusif kami.
        Kami bukan hanya sekadar agen perjalanan, tetapi mitra dalam setiap petualangan Anda. Dengan Visit Tours, Anda tidak hanya mendapatkan paket tour biasa, tetapi pengalaman yang dirancang khusus untuk memenuhi impian perjalanan Anda.
        </p>
        <a href="https://www.instagram.com/aprlmlsa.a/?hl=id" class="btn">My Profile</a>
    </div>

    <script src="js/script.js"></script>
    
    </body>
</html>