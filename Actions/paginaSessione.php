<?php require('../Components/head.php'); ?>
<?php require('../Components/navbar.php'); ?>
<?php require('../Actions/connessioneDB.php'); ?>

<title>Homepage</title>

<td><button  type="submit"><a href="../Home.php"> Vai alla Home</a> </button></form> </td>

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
<form method="POST" action="./inserisciMessaggio.php">
     <label for="Testo">Testo:</label><br>
     <input type="text" id="Testo" name="Testo" value="il mio messaggio"><br><br>
     <input type="submit" value="Submit">
    </form>


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



  </div>
</section>