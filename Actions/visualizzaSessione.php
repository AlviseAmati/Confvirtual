<?php date_default_timezone_set("Europe/Rome"); ?>
<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();
  var_dump($_SESSION);
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $_SESSION["IdSessione"]= $_POST['IdSessione'];
  $_SESSION["OraFine"]= $_POST['OraFine'];
  $_SESSION["OraInizio"]= $_POST['OraInizio'];


  echo "<script>
        location.href= './paginaSessione.php';
        </script>";
?> 