<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';

  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $NumeroPresentazioni = $_POST['NumeroPresentazioni'];
  $LinkTeams = $_POST['LinkTeams'];
  $OraFine = date("h:i:sa", strtotime($_POST['OraFine']));
  $OraInizio = date("h:i:sa", strtotime($_POST['OraInizio']));
  $Titolo = $_POST['Titolo'];

  $sp = "call CREA_SESSIONE ('$NumeroPresentazioni', '$LinkTeams', '$OraFine', '$OraInizio', '$Titolo')";
  $fSi = "Inserimento nuova Sessione con Successo!";
  $fNo = "Errore nell'invio della richiesta";
  ControlloModifica($db, $sp, $fSi, $fNo);   
?> 