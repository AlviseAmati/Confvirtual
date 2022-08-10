<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';

  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $Username = $_POST['Username'];
  $IdPresentazione = $_POST['IdPresentazione'];
   
  //echo $IdConferenza;

  $sp = "DELETE FROM valuta WHERE `valuta`.`Username` = '$Username' AND `valuta`.`IdPresentazione` = $IdPresentazione";

  //echo $sp;
  $fSi = "Eliminazione Valutazione con Successo!";
  $fNo = "Errore nell invio della richiesta";
  ControlloModifica($db, $sp, $fSi, $fNo);   
?> 