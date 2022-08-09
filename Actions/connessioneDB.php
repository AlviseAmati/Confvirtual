<?php
  error_reporting(0);

  // Create connection
  $db = new mysqli('localhost', 'root', '', 'confvirtual');

  // Check connection
  if ($db->connect_error) {
    exit("Connection failed: " . mysqli_connect_error());
  }
?>