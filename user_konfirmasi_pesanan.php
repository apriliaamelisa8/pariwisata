<?php
    require('koneksi.php');
    session_start();
    if ( !isset($_SESSION['login'])){
        header("Location: login.php");
        exit;
    }

        $id_user = $_SESSION['id'];
        $id_destinasi = $_GET['id'];
        $sql = mysqli_query($conn, "INSERT INTO `pemesanan`(`id_user`, `id_destinasi`) VALUES ('".$id_user."','".$id_destinasi."')");
        echo '<script language = "javascript">
        alert("Berhasil Ditambahkan"); document.location = "user_data.php";</script>' ;
?>
