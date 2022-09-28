<?php 

include 'connessioneDB.php';
include 'funzioniPhp.php';    #i nomi dentro la variabile POST devono essere uguale al name nel form di la

$Username = $_POST['Username'];
$Nome = $_POST['Nome'];
$Cognome = $_POST['Cognome'];
$Password = $_POST['Password'];
$DataNascita = date("Y-m-d", strtotime($_POST['DataNascita']));
$LuogoNascita = $_POST['LuogoNascita'];

$sp = "call REGISTRA_UTENTE ('$Username', '$Nome', '$Cognome', '$Password', '$DataNascita', '$LuogoNascita')"; 
$fSi = "Registrazione effettuata con Successo!";
$fNo = "Registrazione non riuscita, Username gia esistente/Errore compilazione";
#echo $sp;

ControlloModificaRegistrati($db, $sp, $fSi, $fNo);

?>