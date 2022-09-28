<?php require('../Components/head.php'); ?>
<?php require('../Components/navbar.php'); ?>
<?php require('../Actions/connessioneDB.php'); ?>

<?php $_SESSION['Pagina']= 'Speaker' ?>
<?php require('./Authentication/ControlloUtente.php'); ?>

<title>Pagina Speaker</title>

<br>
<td><button   class="btn btn-outline-secondary" type="submit" style="margin: 10px 10px 10px;"><a href="../Home.php" style="color:grey;"> Torna alla Home</a> </button></form> </td>

<h1 style="text-align: center;"> Sezione Speaker </h1>
<br><br>

<section>
  <div class="col-12">

  <p style="text-align: center;">
  <a class="btn btn-secondary" data-toggle="collapse" href="#inserisci" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Inserimento dati</a>
  <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#risorsa" aria-expanded="false" aria-controls="multiCollapseExample2">Visualizza Risorse aggiuntive</button>
  <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#presentazione" aria-expanded="false" aria-controls="multiCollapseExample2"> Visualizza Presentazioni</button>
  
 </p>

 <div class="collapse multi-collapse" id="inserisci">
        <h3> Inserisci il tuo CV </h3>
            <form method="POST" action="./inserisciCvSpeaker.php">
                <label for="CurriculumSpeaker">Curriculum:</label><br>
                <input type="text" id="CurriculumSpeaker" name="CurriculumSpeaker" value=""><br><br>
                <input type="submit" value="Submit">
            </form>

        <h3> Inserisci la tua foto </h3>
            <form method="POST" action="./inserisciFotoSpeaker.php">
                <label for="FotoSpeaker">Foto:</label><br>
                <input type="text" id="FotoSpeaker" name="FotoSpeaker" value="http"><br><br>
                <input type="submit" value="Submit">
            </form>

            <h3> Affiliazione Universitaria  </h3>
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

            <h3> Visualizza i tuoi dati  </h3>

   <?php 
    
        $result = mysqli_query($db, 'SELECT Nome,Cognome,Tipo,CurriculumSpeaker,FotoSpeaker,IdUniversita FROM utente WHERE Username = "'.$_SESSION['utente'].'"');
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

<div class="collapse multi-collapse" id="risorsa">
            <h3> Visualizza le tue risorse aggiuntive  <h3>

            <?php 
                
                    $result = mysqli_query($db, 'SELECT * FROM risorsaaggiuntiva WHERE Username = "'.$_SESSION['utente'].'"');
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

                        
                        <td><form action="./eliminaRisorsa.php" method="POST"><input type="hidden" name="IdRisorsa" value="<?php  echo $row[0]; ?>"></input><button type="submit"> Elimina </button></form> </td>
                        
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
        
<div class="collapse multi-collapse" id="presentazione">
            <h3> Visualizza le presentazioni  <h3>

            <?php 
                
                    $result = mysqli_query($db, 'SELECT * FROM presentazione WHERE Tipo = "Tutorial"');
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
                        if($row[11] == $_SESSION['utente']){
                            echo' <td><form action="./paginaRisorsa.php" method="POST"><input type="hidden" name="IdPresentazione" value="<?php  echo $row[0]; ?>"></input><button type="submit"> Aggiungi risorsa </button></form> </td>';

                        }
                       
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

  </div>
</section>