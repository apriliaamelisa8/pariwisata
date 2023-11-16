<?php 

require 'koneksi.php';

session_start();
    if ( !isset($_SESSION['login'])){
        header("Location: login.php");
        exit;
    }

if(isset($_GET['id'])){
    $id_destinasi = $_GET['id'];
    $hapus = mysqli_query($conn, "DELETE FROM `db_destinasi` WHERE `id` = '".$id_destinasi."'");
    if($hapus){
        echo '<script language = "javascript">
        alert("Hapus Berhasil"); document.location = "admin_lihat_data.php";</script>' ;
    }
}
?>