<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $Nome = $_POST['Nome'];
  $Cognome = $_POST['Cognome'];
  $IdPresentazione = $_POST['IdPresentazione'];
  

  $sp = "call INSERISCI_AUTORE ('$Nome', '$Cognome', '$IdPresentazione')";
  $fSi = "Inserimento Autore con Successo!";
  $fNo = "Errore nell invio della richiesta";
 
  ControlloModificaAutore($db, $sp, $fSi, $fNo);   
?> 