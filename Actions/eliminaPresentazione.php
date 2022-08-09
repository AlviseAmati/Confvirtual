<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';

  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $IdPresentazione = $_POST['IdPresentazione'];

  //echo $IdConferenza;

  $sp = "DELETE FROM presentazione WHERE IdPresentazione = ".$IdPresentazione."";

  //echo $sp;
  $fSi = "Eliminazione presentazione con Successo!";
  $fNo = "Errore nell invio della richiesta";
  ControlloModifica($db, $sp, $fSi, $fNo);   
?> 