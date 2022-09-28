<?php require('../Components/head.php'); ?>
<?php require('../Components/navbar.php'); ?>
<?php require('../Actions/connessioneDB.php'); ?>


<?php $_SESSION['Pagina']= 'Amministratore' ?>
<?php require('./Authentication/ControlloUtente.php'); ?>
<?php 

if(isset($_POST['IdPresentazione'])){ //con secondo redirect non aveva piu id pres in post cosi risolvo
$_SESSION['IdPresentazione'] = $_POST['IdPresentazione'];
}


?>

<title>Inserisci Autore</title>

<td><button  class="btn btn-outline-secondary" type="submit" style="margin: 10px 10px 10px;"><a href="../Admin.php" style="color:grey;"> Torna in dietro</a> </button></form> </td>




<section>
  <div class="col-12">
    
  <h4>Visualizza Autori:</h4>
          <?php 
          $Presentazione = $_SESSION['IdPresentazione'];

          $result = mysqli_query($db, "SELECT * FROM autore WHERE IdPresentazione=$Presentazione");
          if(mysqli_num_rows($result) > 0) {

            echo "<table class='table table-dark table-striped'>";
            echo "<thead> <tr>";
    
            $field = $result->fetch_fields();
            $fields = array();
            $j = 0;
            foreach ($field as $col) {
                echo "<th>" . $col->name . "</th>";
                array_push($fields, array(++$j, $col->name));
            }

            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
    
            while ($row = $result->fetch_array()) {
                echo "<tr>";

                for ($i = 0; $i < sizeof($fields); $i++) {
                    $fieldname = $fields[$i][1];
                    $filedvalue = $row[$fieldname];
                    echo "<td>" . $filedvalue . "</td>";
                }
    
                $value = $row[0];
                $Id = $row[1];
                #Aggiunto form per ogni bottone con all'interno un campo nascosto con il valore dell' id da cancellare
         ?>

            

        <?php
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo '<center> <h4> Non ci sono risultati </h4> </center>';
            }
        
        ?>
 


  <h4>Inserimento Autore:</h4>
          <form method="POST" action="inserisciAutore.php">
            <label for="Nome">Nome:</label><br>
            <input type="text" id="Nome" name="Nome" value="Andrea"><br>
            <label for="Nome">Cognome:</label><br>
            <input type="text" id="Cognome" name="Cognome" value="Pesaresi">
            <input type="hidden" id="IdPresentazione" name="IdPresentazione" value="<?php echo $_SESSION['IdPresentazione'];?>"><br><br>
            <input type="submit" value="Submit">
            
          </form><br><br>
            

            
          </form>






  </div>
</section>