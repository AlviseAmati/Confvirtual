<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $Username = $_SESSION['utente'];
  $FotoSpeaker = $_POST['FotoSpeaker'];

  $sp = "call INSERISCI_Foto_Speaker ('$Username', '$FotoSpeaker')";
  $fSi = "Inserimento foto con Successo!";
  $fNo = "Errore nell'invio della richiesta";
 
  #echo $sp;
 
  ControlloModificaSpeaker($db, $sp, $fSi, $fNo);  

?> 