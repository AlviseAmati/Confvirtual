<?php require('../Components/head.php'); ?>
<?php require('../Components/navbar.php'); ?>
<?php require('../Actions/connessioneDB.php'); ?>
<?php $_SESSION['Pagina']= 'Amministratore' ?>
<?php require('./Authentication/ControlloUtente.php'); ?>



<title>Associazione</title>
<br>
<td><button class="btn btn-outline-secondary" type="submit" style="margin: 10px 10px 10px;"><a href="../Admin.php" style="color:grey;"> Torna in dietro</a> </button></form> </td>



<section>
  <div class="col-12">
    
  <?php 
  $IdPresentazione = $_POST['IdPresentazione'];
  $Tipo = $_POST['Tipo'];
    if($Tipo == 'Tutorial'){
        echo '<h3>Associa Speaker a presentazione Tutorial:</h3>
             <form method="POST" action="./associaSpeaker.php">
          <label for="Username">Username:</label><br>
          <input type="text" id="Username" name="Username" value=""><br>
          <input type="hidden" id="IdPresentazione" name="IdPresentazione" value="'.$IdPresentazione.'"><br><br>
          <input type="submit" value="Submit">
        </form>';
    }
    else{
        echo '<h3>Associa Presenter ad un Articolo:</h3>
             <form method="POST" action="./associaPresenter.php">
          <label for="Username">Username:</label><br>
          <input type="text" id="Username" name="Username" value=""><br>
          <input type="hidden" id="IdPresentazione" name="IdPresentazione" value="'.$IdPresentazione.'"><br><br>
          <input type="submit" value="Submit">
        </form>';
    }
  ?>
 


 





  </div>
</section>