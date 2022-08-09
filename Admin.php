<?php require('./Components/head.php'); ?>
<?php require('./Components/navbar.php'); ?>
<?php require('./Actions/connessioneDB.php'); ?>

<title>Homepage</title>

<section>
  <div class="col-12">
    <h1>Operazioni Admin:</h1>
    <h3>Crea Conferenza:</h3>
    <form method="POST" action="Actions/creaConferenza.php">
     <label for="Anno">Anno Edizione:</label><br>
     <input type="text" id="Anno" name="AnnoEdizione" value="1999"><br>
     <label for="Acronimo">Acronimo:</label><br>
     <input type="text" id="Acronimo" name="Acronimo" value="C1"><br>
     <label for="name">Nome:</label><br>
     <input type="text" id="name" name="Nome" value="Conferenza1"><br>
     <label for="date">Data Svolgimento:</label><br>
     <input type="text" id="date" name="DataSvolgimento" value="2022/01/07"><br>
     <label for="logo">Logo:</label><br>
     <input type="text" id="logo" name="Logo" value="http:..."><br><br>
     <input type="submit" value="Submit">
    </form>
    <br>
    <h3>Visualizza Conferenze:</h3>
   
          <?php 
          
            $result = mysqli_query($db, "SELECT * FROM conferenza");
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

                
                <td><form action="Actions/eliminaConferenza.php" method="POST"><input type="hidden" name="idConferenza" value="<?php  echo $value; ?>"></input><button type="submit"> Elimina </button></form> </td>
                
          <?php
                      echo "</tr>";
                  }
                  echo "</tbody>";
                  echo "</table>";
              } else {
                  echo '<center> <h4> Non ci sono risultati </h4> </center>';
              }
          
          ?>
          <h3>Crea Sessione:</h3>
          <form method="POST" action="Actions/creaSessione.php">
            <label for="NumeroPresentazioni">Numero Presentazioni:</label><br>
            <input type="text" id="NumeroPresentazioni" name="NumeroPresentazioni" value="10"><br>
            <label for="LinkTeams">Link Teams:</label><br>
            <input type="text" id="LinkTeams" name="LinkTeams" value="https://"><br>
            <label for="OraFine">Ora Fine:</label><br>
            <input type="text" id="OraFine" name="OraFine" value="10:00:00"><br>
            <label for="OraInizio">Ora Inizio:</label><br>
            <input type="text" id="OraInizio" name="OraInizio" value="08:00:00"><br>
            <label for="Titolo">Titolo:</label><br>
            <input type="text" id="Titolo" name="Titolo" value="Sessione1"><br><br>
            <input type="submit" value="Submit">
          </form>
          <h3>Visualizza Sessioni:</h3>

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

              
              <td><form action="Actions/eliminaSessione.php" method="POST"><input type="hidden" name="IdSessione" value="<?php  echo $value; ?>"></input><button type="submit"> Elimina </button></form> </td>
              
        <?php
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo '<center> <h4> Non ci sono risultati </h4> </center>';
            }
        
        ?>





    <div id="Catalogo"><a id="Scopri" href="/NoloNolo/Progetto_TW/NoloNolo/Actions/catalogo.php">Scopri le nostre conferenze</a></div>
  </div>

  <div class="container textarea">
    <div class="row align-items-center justify-content-center margin-top col-12"> 
      
    <div>   
  </div>
</section>

 <?php include('./Components/footer.php'); ?> 