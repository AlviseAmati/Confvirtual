<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';

  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $IdSessione = $_POST['IdSessione'];

  //echo $IdConferenza;

  $sp = "DELETE FROM sessione WHERE IdSessione = ".$IdSessione."";

  //echo $sp;
  $fSi = "Eliminazione sessione con Successo!";
  $fNo = "Errore nell invio della richiesta";
  ControlloModifica($db, $sp, $fSi, $fNo);   
?> 