<?php

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db   = 'elibrary';

    $conn = mysqli_connect($host, $user, $pass, $db);

    if(!$conn){
      die("gagal konek".mysqli_connect_error());
  }
    ?>