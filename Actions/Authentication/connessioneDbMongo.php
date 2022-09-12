<?php
    //scaricato mongo con composer  ,da console entriamo nella root e dopo aver scaricato composer scarichiamo mongodb co comando (se scarichi da github e gia compreso)
    require_once 'C:\xampp\htdocs\Progetto_Basi\Confvirtual\vendor\autoload.php';
    $conn = new MongoDB\Client('mongodb://localhost:27017');
    $db = $conn->confvirtual;
    $collection = $db->logs;
?>