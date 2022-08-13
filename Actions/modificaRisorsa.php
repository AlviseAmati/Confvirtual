<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $Username = $_SESSION['utente'];
  $LinkWeb = $_POST['LinkWeb'];
  $Descrizione = $_POST['Descrizione'];
  $IdPresentazione = $_SESSION['IdPresentazione'];
  $IdRisorsa = $_POST['IdRisorsa'];
  

  #echo $IdRisorsa;
  $sp = 'UPDATE risorsaaggiuntiva SET LinkWeb = "'.$LinkWeb.'", Descrizione = "'.$Descrizione.'", IdPresentazione = "'.$IdPresentazione.'"  WHERE IdRisorsa= "'.$IdRisorsa.'"';
  $fSi = "Inserimento Universita con Successo!";
  $fNo = "Errore nell'invio della richiesta";
 
  #echo $sp;
  ControlloModificaRisorsa($db, $sp, $fSi, $fNo);   
?> 