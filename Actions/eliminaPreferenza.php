<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';

  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $IdPresentazione = $_POST['IdPresentazione'];
  $Username = $_POST['Username'];

  //echo $IdConferenza;

  $sp = "DELETE FROM preferenza WHERE IdPresentazione = '".$IdPresentazione."' AND Username = '".$Username."'";

  //echo $sp;
  $fSi = "Eliminazione Sponsor con Successo!";
  $fNo = "Errore nell invio della richiesta";
 ControlloModificaHome($db, $sp, $fSi, $fNo);   
?> 