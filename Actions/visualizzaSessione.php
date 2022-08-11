<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();
  var_dump($_SESSION);
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $_SESSION["IdSessione"]= $_POST['IdSessione'];


  echo "<script>
        location.href= './paginaSessione.php';
        </script>";
?> 