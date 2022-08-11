<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $Username = $_SESSION['utente'];
  $LinkWeb = $_POST['LinkWeb'];
  $Descrizione = $_POST['Descrizione'];
  $IdPresentazione = $_POST['IdPresentazione'];
    
  $sp = 'UPDATE utente SET IdUniversita = "'.$Iduni.'" WHERE Username= "'.$Username.'"';
  $fSi = "Inserimento Universita con Successo!";
  $fNo = "Errore nell'invio della richiesta";
 
  #echo $sp;
  ControlloModificaSpeaker($db, $sp, $fSi, $fNo);   
?> 