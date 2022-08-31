<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $Username = $_SESSION['utente'];
  $CurriculumPresenter = $_POST['CurriculumPresenter'];

  $sp = "call INSERISCI_CV_PRESENTER ('$Username', '$CurriculumPresenter')";
  $fSi = "Inserimento CV con Successo!";
  $fNo = "Errore nell'invio della richiesta";
 
  #echo $sp;
 
      ControlloModificaPresenter($db, $sp, $fSi, $fNo);
        
?> 