<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();
  var_dump($_SESSION);
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $IdSessione = $_SESSION['IdSessione'];
  $Testo = $_POST['Testo'];
  $Data =  date('Y-m-d h:i:s ', time());
  $Username = $_SESSION['utente'];


  $sp = "call INSERIMENTO_CHAT ('$IdSessione', '$Testo', '$Data', '$Username')";
  $fSi = "Inserimento messaggio con Successo!";
  $fNo = "Errore nell invio della richiesta";
  #echo $sp;
  ControlloModificaMessaggio($db, $sp, $fSi, $fNo);   
?> 