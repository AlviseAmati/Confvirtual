<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';

  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $IdSponsor = $_POST['IdSponsor'];

  //echo $IdConferenza;

  $sp = "DELETE FROM sponsor WHERE IdSponsor = ".$IdSponsor."";

  //echo $sp;
  $fSi = "Eliminazione Sponsor con Successo!";
  $fNo = "Errore nell invio della richiesta";
  ControlloModifica($db, $sp, $fSi, $fNo);   
?> 