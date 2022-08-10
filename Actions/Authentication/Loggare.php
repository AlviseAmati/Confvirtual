<?php

  include '../connessioneDB.php';

  // Check the session
  $status = session_status();
  if ($status == PHP_SESSION_NONE) {
    session_start();
  } else
  if ($status == PHP_SESSION_ACTIVE || $status == PHP_SESSION_DISABLED) {
    session_destroy();
    session_start();
  }

  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = "select * from utente where Username = '$username' AND Password = '$password'";
  $result = $db->query($query);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_row()) {
      $_SESSION["utente"] = $row[0];
      $_SESSION["tipo"] = $row[6];
        if($row[6] == 'Amministratore'){
            echo '<script type="text/javascript">
            alert("Autententicazione completata con successo");
            location.href = "/Progetto_Basi/confvirtual/Home.php";
          </script>';
        } 
        else if($row[6] == 'Utente'||$row[6] == 'Speaker'||$row[6] == 'Presenter'){
            echo '<script type="text/javascript">
            alert("Autententicazione completata con successo");
            location.href = "/Progetto_Basi/confvirtual/Home.php";
          </script>';
        }
        else{
          echo  $_SESSION["tipoUtente"];
        }
      
    }
  } else {
    echo '<script type="text/javascript">
        alert("Utente non trovato. Riprova");
        location.href = "/Progetto_Basi/confvirtual/Actions/Authentication/LogIn.php";
      </script>';
}