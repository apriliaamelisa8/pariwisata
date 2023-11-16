<?php
    require('koneksi.php');

        $id_konfimasi = $_GET['id'];

        $sql = mysqli_query($conn, "UPDATE `pemesanan` SET `konfirmasi`='1' WHERE id = '".$id_konfimasi."'");
        echo '<script language = "javascript">
        alert("Berhasil Dikonfirmasi"); document.location = "admin_konfirmasi_pesanan.php";</script>' ;
?>
