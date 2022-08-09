<?php
    ini_set('display_errors', 1);
  require('/Progetto_Basi/confvirtual/Actions/Components/head.php'); 
  require('/Progetto_Basi/confvirtual/Actions /Components/navbar.php');
  include ('connessioneDB.php'); 
  include 'funzioniPhp.php';
  session_start();
  $tipo = $_SESSION['tipoUtente'];
  echo "<script> 
    checkUser('$tipo');
   </script>"
?>

<?php 
  if (isset($_SESSION['utente'])) {
    $username = $_SESSION['utente'];

    //Query per informazioni utente
    $query = "SELECT * FROM utente WHERE Username= '$username'"; 
    $res1 = mysqli_query($db, $query);
    $utente = mysqli_fetch_array($res1);

    //Query per indirizzo
    $query2 = "SELECT * FROM indirizzo WHERE Username= '$username'"; 
    $indirizzi = mysqli_query($db, $query2);

    //Query per pagamento
    $query3 = "SELECT * FROM pagamento WHERE Username= '$username' "; 
    $carte = mysqli_query($db, $query3);
    
  } else {
    echo  
      "<script type='text/javascript'>
      alert('Devi essere registrato per accedere a questa pagina');
      location.href = '/Progetto_Basi/confvirtual/Actions/Authentication/LogIn.php';
      </script>";
  }
?>

<title> Il tuo profilo </title>
<section>
    <h2>ciao</h2>
</section>

<!-- <?php require('../components/footer.php'); ?> -->