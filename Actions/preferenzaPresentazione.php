<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();
  var_dump($_SESSION);
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $IdPresentazione = $_POST['IdPresentazione'];
  $Username = $_SESSION['utente'];


  $sp = "INSERT INTO preferenza (IdPresentazione,Username) VALUES ('".$IdPresentazione."','".$Username."')";
  $fSi = "preferenza con Successo!";
  $fNo = "Errore nell invio della richiesta";
  #echo $sp;
  ControlloModificaMessaggio($db, $sp, $fSi, $fNo);   
?> 