<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $Username = $_SESSION['utente'];
  $CurriculumSpeaker = $_POST['CurriculumSpeaker'];

  $sp = "call INSERISCI_CV_SPEAKER ('$Username', '$CurriculumSpeaker')";
  $fSi = "Inserimento CV con Successo!";
  $fNo = "Errore nell'invio della richiesta";
 
  #echo $sp;
  ControlloModificaSpeaker($db, $sp, $fSi, $fNo);   
?> 