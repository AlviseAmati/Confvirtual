<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';

  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $IdRisorsa = $_POST['IdRisorsa'];
   
  //echo $IdConferenza;

  $sp = "DELETE FROM risorsaaggiuntiva WHERE `risorsaaggiuntiva`.`IdRisorsa` = '$IdRisorsa' ";

  //echo $sp;
  $fSi = "Eliminazione Risorsa con Successo!";
  $fNo = "Errore nell invio della richiesta";
  ControlloModificaSpeaker($db, $sp, $fSi, $fNo); 
?> 