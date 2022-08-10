<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';

  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $Nome = $_POST['Nome'];
  $ImmagineLogo = $_POST['ImmagineLogo'];

  $sp = "call INSERISCI_SPONSOR ('$Nome', '$ImmagineLogo')";
  $fSi = "Inserimento Sponsor con Successo!";
  $fNo = "Errore nell'invio della richiesta";
 
  #echo $sp;
  ControlloModifica($db, $sp, $fSi, $fNo);   
?> 