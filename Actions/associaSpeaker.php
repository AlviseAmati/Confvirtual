<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';

  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $Username = $_POST['Username'];
  $IdPresentazione = $_POST['IdPresentazione'];

  $sp = "call ASSOCIA_SPEAKER ('$Username', '$IdPresentazione')";
  $fSi = "Associazione Speaker avvenuta con Successo!";
  $fNo = "Errore nell'invio della richiesta";
 
  #echo $sp;
  ControlloModifica($db, $sp, $fSi, $fNo);   
?> 