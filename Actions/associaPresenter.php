<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();

 
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $Username = $_POST['Username'];
  $IdPresentazione = $_POST['IdPresentazione'];

    $verifica = mysqli_query($db,'SELECT Tipo FROM utente WHERE Username="'.$Username.'"');
    $row = $verifica->fetch_array();
    
    if($row[0] == "Presenter"){
  $sp = "call ASSOCIA_PRESENTER ('$Username', '$IdPresentazione')";
  $fSi = "Associazione Presenter avvenuta con Successo!";
  $fNo = "Errore nell'invio della richiesta";
  
  #echo $sp;
  ControlloModifica($db, $sp, $fSi, $fNo);   
    }
 else{
  echo "<script>
        alert('non stai inserendo un account Presenter');
        location.href= '/Progetto_Basi/confvirtual/Admin.php';
        </script>";
 }
?> 