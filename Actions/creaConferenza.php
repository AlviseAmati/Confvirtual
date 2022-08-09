<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';

  $AnnoEdizione = $_POST['AnnoEdizione'];
  $Acronimo = $_POST['Acronimo'];
  $Nome = $_POST['Nome'];
  $DataSvolgimento = date("Y-m-d", strtotime($DataSvolgimento));
  $Logo = $_POST['Logo'];

  $sp = "call CREA_CONFERENZA ('$AnnoEdizione', '$Acronimo', '$Nome', '$DataSvolgimento', '$Logo')";
  $fSi = "Inserimento nuova Conferenza con Successo!";
  $fNo = "Errore nell'invio della richiesta";
  ControlloModifica($db, $sp, $fSi, $fNo); 
?>