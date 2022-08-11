<?php require('../Components/head.php'); ?>
<?php require('../Components/navbar.php'); ?>
<?php require('../Actions/connessioneDB.php'); ?>


<title>Pagina Speaker</title>

<td><button  type="submit"><a href="../Home.php"> Vai alla Home</a> </button></form> </td>

<h1 style="text-align: center;"> Sezione Speaker </h1>

<h3> Inserisci il tuo CV <h3>
    <form method="POST" action="./inserisciCvSpeaker.php">
        <label for="CurriculumSpeaker">Curriculum:</label><br>
        <input type="text" id="CurriculumSpeaker" name="CurriculumSpeaker" value=""><br><br>
        <input type="submit" value="Submit">
     </form>

<h3> Inserisci la tua foto <h3>
     <form method="POST" action="./inserisciFotoSpeaker.php">
        <label for="FotoSpeaker">Foto:</label><br>
        <input type="text" id="FotoSpeaker" name="FotoSpeaker" value="http"><br><br>
        <input type="submit" value="Submit">
     </form>

     <h3> Affiliazione Universitaria  <h3>
     <form method="POST" action="./inserisciAffiliazioneUni.php">
        <label for="Iduni">Nome Universita:</label><br>
        <select id="Iduni" name="Iduni" >
            <?php 
            $result = mysqli_query($db, "SELECT * FROM affiliazioneuniversita");
            while ($row = $result->fetch_array()){
                echo '<option value="'.$row[0].'">'.$row[1].' '.$row[2].'</option>';
            }
            ?>
        </select><br><br>
        <input type="submit" value="Submit">
     </form>

     <h3> Visualizza le tue risorse aggiuntive  <h3>

     <?php 
          
            $result = mysqli_query($db, 'SELECT * FROM risorsaaggiuntiva WHERE Username = "'.$Username.'"');
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

<h3> Crea una tua risorsa aggiuntiva: <h3>
    <form method="POST" action="./inserisciRisorsa.php">
        <label for="LinkWeb">Link Web:</label><br>
        <input type="text" id="LinkWeb" name="LinkWeb" value="http"><br>
        <label for="Descrizione">Descrizione:</label><br>
        <input type="text" id="Descrizione" name="Descrizione" value="risorsa.."><br>
        <label for="IdRisorsa">IdRisorsa:</label><br>
        <input type="text" id="IdRisorsa" name="IdRisorsa" value="1"><br>
        <input type="submit" value="Submit">
     </form>


  </div>
</section>