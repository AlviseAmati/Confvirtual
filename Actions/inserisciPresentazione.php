<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';

  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $NumSequenze = $_POST['NumSequenze'];
  $OrarioFine = date("h:i:sa", strtotime($_POST['OrarioFine']));
  $OrarioInizio = date("h:i:sa", strtotime($_POST['OrarioInizio']));
  $Titolo = $_POST['Titolo'];
  $Pdf = $_POST['Pdf'];
  $NumeroPagine = $_POST['NumeroPagine'];
  $StatoSvolgimento = $_POST['StatoSvolgimento'];
  $Abstract = $_POST['Abstract'];
  $IdSessione = $_POST['IdSessione'];
  $Tipo = $_POST['Tipo'];
  $Username = $_POST['Username'];

  $sp = "call INSERISCI_PRESENTAZIONE ('$NumSequenze', '$OrarioFine', '$OrarioInizio', '$Titolo' , '$Pdf', '$NumeroPagine', '$StatoSvolgimento', '$Abstract', '$IdSessione', '$Tipo', '$Username')";
  $fSi = "Inserimento nuova presentazione con Successo!";
  $fNo = "Errore nell'invio della richiesta";
 
  ControlloModifica($db, $sp, $fSi, $fNo);   
?> 