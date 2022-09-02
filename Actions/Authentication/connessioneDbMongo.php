<?php
    //scaricato mongo con composer
    require_once 'C:\xampp\htdocs\Progetto_Basi\Confvirtual\vendor\autoload.php';
    $conn = new MongoDB\Client('mongodb://localhost:27017');
    $db = $conn->confvirtual;
    $collection = $db->logs;
?>