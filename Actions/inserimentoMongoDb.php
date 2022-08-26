<?php  
require('../Actions/connessioneDbMongo.php');




//creo i documenti JSON
$document1 = [
  'utente' => 'paolobianchi',  
  'pizza' => 'margherita', 
  'prezzo' => '5'
]; 

$document2 = [
  'utente' => 'paolabianchi',  
  'pizza' => 'diavola',
  'aggiunta' => 'patatine',  
  'prezzo' => '7'
]; 

//BulkWrite è la funzionalità per scrivere sul database MongoDB anche più documenti insieme 
$bulk = new MongoDB\Driver\BulkWrite;  

//preparo i documenti ad una operazione di insert
$_id1 = $bulk->insert($document1); 
$_id2 = $bulk->insert($document2); 

//opzionale utile per debug
//var_dump($_id1, $_id2); 

//connessione MongoDB in localhost
$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017'); 

//inserisco i documenti nella collection chiamata MyCollection dentro al database chiamato MyDatabase
$result = $manager->executeBulkWrite('mydatabase.mycollection', $bulk); 

?> 