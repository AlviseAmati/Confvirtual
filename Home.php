<?php require('./Components/head.php'); ?>
<?php require('./Components/navbar.php'); ?>
<?php require('./Actions/Authentication/ControlloUtente.php'); ?>
<?php require('./Actions/connessioneDB.php'); ?>

<title>Homepage</title>
<h1 style="text-align: center;"> Benvenuto
<?php
 echo $_SESSION["utente"];
?>
</h1>

<section>
  <div class="col-12">
    <img src="./img/palanero.jpg" width="100%" height="900" />
    
  </div>

  <div class="container textarea">
    <div class="row align-items-center justify-content-center margin-top col-12"> 
      
    <div>   
  </div>
</section>
  <div>
    <h2>Visualizza Conferenze Disponibili:</h2>
          <?php 
                  
                  $result = mysqli_query($db, "SELECT * FROM VISUALIZZA_CONFERENZE");
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
          
             
              <td><form action="Actions/registraConferenza.php" method="POST"><input type="hidden" name="IdConferenza" value="<?php  echo $value; ?>"></input><button type="submit"> Registrati </button></form> </td>
              
        <?php
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo '<center> <h4> Non ci sono risultati </h4> </center>';
            }
        
        ?>

          <h2>Visualizza le  conferenze a cui parteciperai:</h2>

           <?php  
                  
                  $result = mysqli_query($db, "SELECT * FROM registra");
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


 

<h2>Visualizza le  Sessioni disponibili:</h2>

          <?php  
                
                $result = mysqli_query($db, "SELECT * FROM sessione");
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
    
          <td><form action="Actions/visualizzaSessione.php" method="POST"><input type="hidden" name="IdSessione" value="<?php  echo $value; ?>"></input><input type="hidden" name="OraFine" value="<?php  echo $row[3]; ?>"></input><input type="hidden" name="OraInizio" value="<?php  echo $row[4]; ?>"></input><button type="submit"> Visualizza </button></form> </td>
            
          <?php
                  echo "</tr>";
              }
              echo "</tbody>";
              echo "</table>";
          } else {
              echo '<center> <h4> Non ci sono risultati </h4> </center>';
          }

          ?>

<h2>Visualizza le  tue presentazioni favorite:</h2>

<?php  
      
      $result = mysqli_query($db, "SELECT * FROM preferenza WHERE Username= '".$_SESSION['utente']."'");
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

<div>
    <?php
        if ($_SESSION["utente"]== "Speaker" ){
                echo '<button><a href="./Actions/paginaSpeaker.php">Sezione Speaker</a></button>';
        }
        else if ($_SESSION["utente"]== "Presenter" ){
                 echo '<button><a href="./Actions/paginaPresenter.php">Sezione Presenter</a></button>';
        }

    ?>
</div>





  </div>

 <?php include('./Components/footer.php'); ?> 