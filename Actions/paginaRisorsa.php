<?php require('../Components/head.php'); ?>
<?php require('../Components/navbar.php'); ?>
<?php require('../Actions/connessioneDB.php'); ?>

<?php 
if(!isset($_SESSION['IdPresentazione'])){
    $_SESSION['IdPresentazione'] = $_POST['IdPresentazione'];
}

?>


<title>Pagina Speaker</title>
<br>
<td><button class="btn btn-outline-secondary" type="submit"><a href="./paginaSpeaker.php" style="color:grey;"> Torna a pag. Speaker</a> </button></form> </td>

<section>
  <div class="col-12">
        

        <h3> Crea una nuova risorsa aggiuntiva: <h3>
            <form method="POST" action="./inserisciRisorsa.php">
                <label for="LinkWeb">Link Web:</label><br>
                <input type="text" id="LinkWeb" name="LinkWeb" value="http"><br>
                <label for="Descrizione">Descrizione:</label><br>
                <input type="text" id="Descrizione" name="Descrizione" value="risorsa.."><br><br>
                <input type="submit" value="Submit">
            </form>

            <h3> Visualizza le tue risorse  <h3>

<?php 
    
        $result = mysqli_query($db, 'SELECT * FROM risorsaaggiuntiva WHERE Username = "'.$_SESSION["utente"].'"');
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
            #Aggiunto form per ogni bottone con all'interno un campo nascosto con il valore dell' id da cancellare
    ?>

            
            <td><form action="./paginaModificaRisorsa.php" method="POST"><input type="hidden" name="IdRisorsa" value="<?php  echo $row[0]; ?>"></input><input type="hidden" name="LinkWeb" value="<?php  echo $row[1]; ?>"></input><input type="hidden" name="Descrizione" value="<?php  echo $row[2]; ?>"></input><input type="hidden" name="IdPresentazione" value="<?php  echo $row[3]; ?>"></input><input type="hidden" name="Username" value="<?php  echo $row[4]; ?>"></input><button type="submit"> Modifica </button></form> </td>
            
    <?php

                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo '<center> <h4> Non ci sono risultati </h4> </center>';
        }
    
    ?>

  </div>
</section>