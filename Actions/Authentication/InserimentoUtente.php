<?php
  include '../connessioneDB.php';
  session_start();
  try {
    $query ='CALL REGISTRA_UTENTE(?,?,?,?,?,?)';  // ?servono per evitare errore di php che ti mettono quiery dentro e quinid glieli passiamo dopo
    $call = mysqli_prepare($db, $query); //prepari la query
  
    mysqli_stmt_bind_param($call, 'ssssss', $_POST['username'], $_POST['nome'], $_POST['cognome'], $_POST['password'],$_POST['datanascita'],$_POST['luogonascita']);
    $result = mysqli_stmt_execute($call);
    header("location: ./LogIn.php"); 
  } catch (Exception $e) {
    $_SESSION['ErrorRegistrazione'] = $e->getMessage();
    header("location: ./Registrati.php"); 
    //echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
?>