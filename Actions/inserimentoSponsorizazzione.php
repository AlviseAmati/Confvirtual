<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $IdConferenza = $_POST['IdConferenza'];
  $IdSponsor = $_POST['IdSponsor'];
  $Importo = $_POST['ImportoSponsorizazzione'];
  

  $sp = "call INSERISCI_SPONSORIZAZZIONE ('$IdConferenza', '$IdSponsor', '$Importo')";
  $fSi = "Inserimento Sponsorizazzione con Successo!";
  $fNo = "Errore nell invio della richiesta";
  
  ControlloModifica($db, $sp, $fSi, $fNo);   
?> 