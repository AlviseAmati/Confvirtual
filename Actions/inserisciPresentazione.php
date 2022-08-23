<?php date_default_timezone_set("Europe/Rome"); ?>
<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();

  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $NumSequenze = $_POST['NumSequenze'];
  $OrarioFine = date("h:i:s", strtotime($_POST['OrarioFine']));
  $OrarioInizio = date("h:i:s", strtotime($_POST['OrarioInizio']));
  $Titolo = $_POST['Titolo'];
  $Pdf = $_POST['Pdf'];
  $NumeroPagine = $_POST['NumeroPagine'];
  $Abstract = $_POST['Abstract'];
  $IdSessione = $_SESSION['IdSessione'];
  $Tipo = $_POST['Tipo'];
  


  $sp = "call INSERISCI_PRESENTAZIONE ('$NumSequenze', '$OrarioFine', '$OrarioInizio', '$Titolo' , '$Pdf', '$NumeroPagine','$Abstract', '$IdSessione', '$Tipo')";
  $fSi = "Inserimento nuova presentazione con Successo!";
  $fNo = "Errore nell invio della richiesta";
 
  #echo $sp;
  ControlloModifica($db, $sp, $fSi, $fNo);   

?> 