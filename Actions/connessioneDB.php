<?php
  ini_set('display_startup_errors', 1);
  ini_set('display_errors', 1);
  error_reporting(-1);

  // Create connection
  $db = new mysqli('p:localhost', 'root', 'alvi', 'confvirtual'); // ('localhost', 'root', '', 'confvirtual')  per portatile alvi
// p conn persistente e non si chiude invece di richiamarla sempre, noi creiamo ogni volta una conn nuova e non usiamo oggetto per con p: lui prende 
//la conn creata in precedenza senza crearne un altra
  // Check connection
  if ($db->connect_error) {
    exit("Connection failed: " . mysqli_connect_error());
  }
?>