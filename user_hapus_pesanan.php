<?php 

require 'koneksi.php';

session_start();
    if ( !isset($_SESSION['login'])){
        header("Location: login.php");
        exit;
    }

if(isset($_GET['id'])){
    $id_pesanan = $_GET['id'];
    $hapus = mysqli_query($conn, "DELETE FROM `pemesanan` WHERE `id` = '".$id_pesanan."'");
    if($hapus){
        echo '<script language = "javascript">
        alert("Hapus Berhasil"); document.location = "user_data.php";</script>' ;
    }
}
?>