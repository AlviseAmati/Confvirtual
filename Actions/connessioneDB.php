<?php
  error_reporting(0);

  // Create connection
  $db = new mysqli('localhost', 'root', 'alvi', 'confvirtual'); // ('localhost', 'root', '', 'confvirtual')  per portatile alvi

  // Check connection
  if ($db->connect_error) {
    exit("Connection failed: " . mysqli_connect_error());
  }
?>