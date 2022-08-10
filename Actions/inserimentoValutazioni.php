<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';

  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $Username = $_POST['Username'];
  $IdPresentazione = $_POST['IdPresentazione'];
  $Voto = $_POST['Voto'];
  $Note = $_POST['Note'];

  $sp = "call INSERISCI_VALUTAZIONE ('$Username', '$IdPresentazione', '$Voto', '$Note')";
  $fSi = "Inserimento Valutazione avvenuta con Successo!";
  $fNo = "Errore nell'invio della richiesta";
 
  #echo $sp;
  ControlloModifica($db, $sp, $fSi, $fNo);   
?> 