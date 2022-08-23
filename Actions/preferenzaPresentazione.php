<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();
  var_dump($_SESSION);
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $IdPresentazione = $_POST['IdPresentazione'];
  $Username = $_SESSION['utente'];

  $verifica = mysqli_query($db,'SELECT IdPresentazione FROM preferenza WHERE Username="'.$Username.'"');
  $row = $verifica->fetch_array();

  if($row[0] > 0 ) {
    echo "<script>
    alert('Hai gia espresso questa preferenza');
    location.href= '/Progetto_Basi/confvirtual/Actions/paginaSessione.php';
    </script>";
} 
else {

  $sp = "INSERT INTO preferenza (IdPresentazione,Username) VALUES ('".$IdPresentazione."','".$Username."')";
  $fSi = "preferenza con Successo!";
  $fNo = "Errore nell invio della richiesta";
  #echo $sp;
  ControlloModificaMessaggio($db, $sp, $fSi, $fNo);   
}
?> 