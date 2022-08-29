<?php
  ini_set('display_startup_errors', 1);
  ini_set('display_errors', 1);
  error_reporting(-1);

  // Create connection
  $db = new mysqli('localhost', 'root', 'alvi', 'confvirtual'); // ('localhost', 'root', '', 'confvirtual')  per portatile alvi

  // Check connection
  if ($db->connect_error) {
    exit("Connection failed: " . mysqli_connect_error());
  }
?>