<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();
  var_dump($_SESSION);
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $IdConferenza = $_POST['IdConferenza'];
  $Username = $_SESSION['utente'];


  $sp = "call REGISTRA_CONFERENZA ('$IdConferenza', '$Username')";
  $fSi = "Registrazione conferenza Conferenza con Successo!";
  $fNo = "Errore nell invio della richiesta";
  #echo $sp;
  ControlloModificaHome($db, $sp, $fSi, $fNo);   
?> 