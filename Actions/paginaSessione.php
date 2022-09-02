<?php require('../Components/head.php'); ?>
<?php require('../Components/navbar.php'); ?>
<?php require('../Actions/connessioneDB.php'); ?>


<title>Homepage</title>

<br>
<td><button class="btn btn-outline-secondary" type="submit" style="margin: 10px 10px 10px;"><a href="../Home.php" style="color:grey; " > Vai alla Home</a> </button></form> </td>

<h1 style="text-align: center;"> Visualizza le sessioni
<?php
 echo $_SESSION["utente"];
?>
</h1>

<section>
  <div class="col-12">
    


  <h2>Visualizza le  Presentazioni della sessione:</h2>

<?php  
      
      $result = mysqli_query($db, "SELECT * FROM presentazione WHERE IdSessione= ".$_SESSION['IdSessione']."");
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

<td><form action="./preferenzaPresentazione.php" method="POST"><input type="hidden" name="IdPresentazione" value="<?php  echo $row[0]; ?>"></input><button type="submit"> Aggiungi ai preferiti </button></form> </td>
  
<?php
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo '<center> <h4> Non ci sono risultati </h4> </center>';
}

?>

<h2>Inserisci Messaggio nella sessione corrente:</h2>
<?php date_default_timezone_set("Europe/Rome"); ?>
<?php

echo  'Puoi scrivere fra le '. $_SESSION["OraInizio"]. ' e le ' .$_SESSION["OraFine"];

if ( date("H:i:s")>=$_SESSION["OraInizio"] && date("H:i:s")<=$_SESSION["OraFine"]) {
        echo '<form method="POST" action="./inserisciMessaggio.php">
            <label for="Testo">Testo:</label><br>
            <input type="text" id="Testo" name="Testo" value="il mio messaggio"><br><br>
            <input type="submit" value="Submit">
            </form>';
}
else{
    echo "non sei nell ora giusta";
}
?>


    <h2>Visualizza i messaggi della sessione corrente:</h2>

    <?php  
          
                        
                        $result = mysqli_query($db, "SELECT Testo,Data,Username FROM messaggio WHERE IdSessione= ".$_SESSION['IdSessione']."");
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