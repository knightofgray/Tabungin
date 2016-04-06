<?php

  $mysqli = new mysqli('localhost', 'root', '', 'enumeration');

  if (mysqli_connect_errno()) {
    printf("Koneksi Gagal : %s\n", mysqli_connect_error());
    exit();
  }
  
  $url = 'http://localhost/lomba/enumeration/';

?>
