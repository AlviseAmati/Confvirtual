<?php
  include 'connessioneDB.php';
  include 'funzioniPhp.php';
  session_start();
  #i nomi dentro la variabile POST devono essere uguale al name nel form di la
  $Username = $_SESSION['utente'];
  $Iduni = $_POST['Iduni'];
  
  $verifica = mysqli_query($db,'SELECT IdUniversita FROM utente WHERE  Username= "'.$Username.'"');
  $row = $verifica->fetch_array();
 
  if($Iduni == $row[0]){
          //echo $sp;
      if ($_SESSION['utente'] == "Speaker"){
        ControlloModificaSpeaker($db, $sp, $fSi, $fNo);  
        }
        else {
          ControlloModificaPresenter($db, $sp, $fSi, $fNo);
        } 

  }
  else{
        $sp = 'UPDATE utente SET IdUniversita = "'.$Iduni.'" WHERE Username= "'.$Username.'"';
        $fSi = "Inserimento Universita con Successo!";
        $fNo = "Errore nell'invio della richiesta";
      
        //echo $sp;
        if ($_SESSION['utente'] == "Speaker"){
          ControlloModificaSpeaker($db, $sp, $fSi, $fNo);  
          }
          else {
            ControlloModificaPresenter($db, $sp, $fSi, $fNo);
          } 

  }

?> 