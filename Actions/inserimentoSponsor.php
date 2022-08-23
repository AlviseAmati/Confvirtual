<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';

  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $Nome = $_POST['Nome'];
  $ImmagineLogo = $_POST['ImmagineLogo'];

  $verifica = mysqli_query($db,'SELECT Nome FROM sponsor WHERE Nome="'.$Nome.'"');
  $row = $verifica->fetch_array();

  if($row > 0 ) {

  
        echo "<script>
        alert('Lo sponsor esiste gia');
        location.href= '/Progetto_Basi/confvirtual/Admin.php';
        </script>";
} 
else{
  $sp = "call INSERISCI_SPONSOR ('$Nome', '$ImmagineLogo')";
        $fSi = "Inserimento Sponsor con Successo!";
        $fNo = "Errore nell'invio della richiesta";
       
        #echo $sp;
        ControlloModifica($db, $sp, $fSi, $fNo);  
 }
?> 