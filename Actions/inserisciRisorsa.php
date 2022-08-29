<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $Username = $_SESSION['utente'];
  $LinkWeb = $_POST['LinkWeb'];
  $Descrizione = $_POST['Descrizione'];
  $IdPresentazione = $_SESSION['IdPresentazione'];
  

  
  $sp = 'INSERT INTO risorsaaggiuntiva  (LinkWeb,Descrizione,IdPresentazione,Username) VALUES ("'.$LinkWeb.'","'.$Descrizione.'","'.$IdPresentazione.'","'.$Username.'")';
  #$sp = 'UPDATE risorsaaggiuntiva SET LinkWeb = "'.$LinkWeb.'", Descrizione = "'.$Descrizione.'", IdPresentazione = "'.$IdPresentazione.'"  WHERE Username= "'.$Username.'"';
  $fSi = "Inserimento Universita con Successo!";
  $fNo = "Errore nell invio della richiesta";
  ControlloModificaRisorsa($db, $sp, $fSi, $fNo);   
?> 