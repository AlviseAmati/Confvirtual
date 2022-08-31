<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $Username = $_SESSION['utente'];
  $FotoPresenter = $_POST['FotoPresenter'];

  $sp = "call INSERISCI_Foto_Presenter ('$Username', '$FotoPresenter')";
  $fSi = "Inserimento foto con Successo!";
  $fNo = "Errore nell'invio della richiesta";
 
  #echo $sp;
 
  ControlloModificaPresenter($db, $sp, $fSi, $fNo);  

?> 