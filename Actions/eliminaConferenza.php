<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';

  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $IdConferenza = $_POST['idConferenza'];

  //echo $IdConferenza;

  $sp = "DELETE FROM conferenza WHERE IdConferenza = ".$IdConferenza."";

  //echo $sp;
  $fSi = "Inserimento nuova Conferenza con Successo!";
  $fNo = "Errore nell invio della richiesta";
  ControlloModifica($db, $sp, $fSi, $fNo);   
?> 