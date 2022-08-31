<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';

  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $Username = $_POST['Username'];
  $IdPresentazione = $_POST['IdPresentazione'];

  $verifica = mysqli_query($db,'SELECT Tipo FROM utente WHERE Username="'.$Username.'"');
  $row = $verifica->fetch_array();
  
  if($row[0] == "Speaker"){

  $sp = "call ASSOCIA_SPEAKER ('$Username', '$IdPresentazione')";
  $fSi = "Associazione Speaker avvenuta con Successo!";
  $fNo = "Errore nell'invio della richiesta";
 
  #echo $sp;
  ControlloModifica($db, $sp, $fSi, $fNo);   
}
else{
 echo "<script>
       alert('non stai inserendo un account Speaker');
       location.href= '/Progetto_Basi/confvirtual/Admin.php';
       </script>";
}
?> 