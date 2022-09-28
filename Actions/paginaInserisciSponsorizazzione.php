<?php require('../Components/head.php'); ?>
<?php require('../Components/navbar.php'); ?>
<?php require('../Actions/connessioneDB.php'); ?>


<?php $_SESSION['Pagina']= 'Amministratore' ?>
<?php require('./Authentication/ControlloUtente.php'); ?>

<title>Inserisci Sponsorizazzione</title>

<td><button  class="btn btn-outline-secondary" type="submit" style="margin: 10px 10px 10px;"><a href="../Admin.php" style="color:grey;"> Torna in dietro</a> </button></form> </td>



<section>
  <div class="col-12">
    
  <h4>Visualizza Sponsor:</h4>
          <?php 
          
          $result = mysqli_query($db, "SELECT * FROM sponsor");
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
 


  <h4>Inserimento Sponsorizazzione:</h4>
          <form method="POST" action="inserisciAutore.php">
            <label for="Nome">IdSponsor:</label><br>
            <input type="text" id="IdSponsor" name="IdSponsor" value="1"><br>
            <label for="Nome">Importo Sponsorizazzione:</label><br>
            <input type="text" id="ImportoSponsorizazzione" name="ImportoSponsorizazzione" value="120">
            <input type="hidden" id="IdConferenza" name="IdConferenza" value="<?php echo $_POST['IdConferenza'];?>"><br><br>
            <input type="submit" value="Submit">
            
          </form><br><br>
            

            
          </form>






  </div>
</section>