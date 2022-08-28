<?php  
require('../Actions/Authentication/connessioneDbMongo.php');




//creo i documenti JSON
$document1 = [
  'utente' => 'paolobianchi',  
  'pizza' => 'margherita', 
  'prezzo' => '5'
]; 

$collection->insertOne($document1);





?> 