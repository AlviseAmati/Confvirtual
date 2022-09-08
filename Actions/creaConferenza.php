<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();

  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $AnnoEdizione = $_POST['AnnoEdizione'];
  $Acronimo = $_POST['Acronimo'];
  $Nome = $_POST['Nome'];
  $DataSvolgimento = date("Y-m-d", strtotime($_POST['DataSvolgimento']));
  $Logo = $_POST['Logo'];
  $UsernameAmministratore = $_SESSION['utente'];

  $sp = "call CREA_CONFERENZA ('$AnnoEdizione', '$Acronimo', '$Nome', '$DataSvolgimento', '$Logo', '$UsernameAmministratore')";
  $fSi = "Inserimento nuova Conferenza con Successo!";
  $fNo = "Errore nell invio della richiesta";
  ControlloModifica($db, $sp, $fSi, $fNo);   
?> 