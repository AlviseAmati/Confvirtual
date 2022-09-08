<?php require('./Components/head.php'); ?>
<?php require('./Components/navbar.php'); ?>
<?php require('./Actions/connessioneDB.php'); ?>
<?php require('./Actions/Authentication/ControlloUtente.php'); ?>

<title>Homepage</title>

<br>
<td><button  class="btn btn-outline-secondary" type="submit" style="margin: 10px 10px 10px;"><a href="./Home.php" style="color:grey;"> Vai alla Home</a> </button></form> </td>

<section>
  <div class="col-12">

  <h1>Dashboard Admin:</h1>


  <p style="text-align: center;">
  <a class="btn btn-secondary" data-toggle="collapse" href="#conferenza" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Crea Conferenza</a>
  <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#sessione" aria-expanded="false" aria-controls="multiCollapseExample2">Crea Sessione</button>
  <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#presentazione" aria-expanded="false" aria-controls="multiCollapseExample2"> Visualizza Presetnazioni/Associa Utente</button>
  <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#valutazione" aria-expanded="false" aria-controls="multiCollapseExample2"> Inserisci Valutazioni</button>
  <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#sponsor" aria-expanded="false" aria-controls="multiCollapseExample2"> Inserisci Sponsor</button>
  <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#sponsorizazzione" aria-expanded="false" aria-controls="multiCollapseExample2"> Inserisci Sponsorizzazione</button>

  
 </p>


<div class="collapse multi-collapse" id="conferenza">
    <h3>Crea Conferenza:</h3>
    <form method="POST" action="Actions/creaConferenza.php">
     <label for="Anno">Anno Edizione:</label><br>
     <input type="text" id="Anno" name="AnnoEdizione" value="1999"><br>
     <label for="Acronimo">Acronimo:</label><br>
     <input type="text" id="Acronimo" name="Acronimo" value="C1"><br>
     <label for="name">Nome:</label><br>
     <input type="text" id="name" name="Nome" value="Conferenza1"><br>
     <label for="date">Data Svolgimento:</label><br>
     <input type="date" id="date" name="DataSvolgimento" value="2022/01/07"><br>
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
</div> 
<br><br>

<div class="collapse multi-collapse" id="sessione">
          <h3>Crea Sessione:</h3>
          <form method="POST" action="Actions/creaSessione.php">
            <label for="NumeroPresentazioni">Numero Presentazioni:</label><br>
            <input type="text" id="NumeroPresentazioni" name="NumeroPresentazioni" value="10"><br>
            <label for="LinkTeams">Link Teams:</label><br>
            <input type="text" id="LinkTeams" name="LinkTeams" value="https://"><br>
            <label for="OraFine">Ora Fine:</label><br>
            <input type="time" id="OraFine" name="OraFine" value="10:00:00"><br>
            <label for="OraInizio">Ora Inizio:</label><br>
            <input type="time" id="OraInizio" name="OraInizio" value="08:00:00"><br>
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

              
              
              <td><form action="Actions/paginaInserisciPresentazione.php" method="POST"><input type="hidden" name="IdSessione" value="<?php  echo $value; ?>"></input><button type="submit"> Inserisci Presentazione </button></form> </td>
              
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
<br><br>
         
<div class="collapse multi-collapse" id="presentazione">       
          <h3>Visualizza Presentazioni:</h3>
          <?php 
          
          $result = mysqli_query($db, "SELECT * FROM presentazione");
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

                <td><form action="Actions/eliminaPresentazione.php" method="POST"><input type="hidden" name="IdPresentazione" value="<?php  echo $value; ?>"></input><button type="submit"> Elimina </button></form> </td>
                <td><form action="Actions/paginaAssociazioneUtente.php" method="POST"><input type="hidden" name="IdPresentazione" value="<?php  echo $row[0]; ?>"></input><input type="hidden" name="Tipo" value="<?php  echo $row[10]; ?>"></input><button type="submit"> Associa </button></form> </td>
              
              <?php 
              if($row[10]=="Articolo"){
                echo '
                
                <td><form action="Actions/paginaInserisciAutore.php" method="POST"><input type="hidden" name="IdPresentazione" value="'.$value.'"></input><button type="submit"> Visualizza/Inserisci Autori </button></form> </td>
              ';
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
<br><br>          


<div class="collapse multi-collapse" id="valutazione">
          <h4>Inserimento valutazioni presentazioni:</h4>
          <form method="POST" action="Actions/inserimentoValutazioni.php">
            <label for="Username">Username:</label><br>
            <input type="text" id="Username" name="Username" value="Alvi"><br>
            <label for="IdPresentazione">IdPresentazione:</label><br>
            <input type="text" id="IdPresentazione" name="IdPresentazione" value="1"><br>
            <label for="Voto">Voto:</label><br>
            <input type="text" id="Voto" name="Voto" value="1"><br>
            <label for="Note">Note:</label><br>
            <input type="text" id="Note" name="Note" value="nota"><br><br>
            <input type="submit" value="Submit">
          </form>

          <h4>Visualizza valutazioni presentazioni:</h4>

          <?php 
          
          $result = mysqli_query($db, "SELECT * FROM valuta");
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

            <td><form action="Actions/eliminaValutazioni.php" method="POST"><input type="hidden" name="Username" value="<?php  echo $value; ?>"></input><input type="hidden" name="IdPresentazione" value="<?php  echo $Id; ?>"></input><button type="submit"> Elimina </button></form> </td>

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
<br><br>

<div class="collapse multi-collapse" id="sponsor">
        <h4>Inserimento Sponsor:</h4>
          <form method="POST" action="Actions/inserimentoSponsor.php">
            <label for="Nome">Nome:</label><br>
            <input type="text" id="Nome" name="Nome" value="Alvi"><br>
            <label for="ImmagineLogo">ImmagineLogo:</label><br>
            <input type="text" id="ImmagineLogo" name="ImmagineLogo" value="http"><br><br>
            <input type="submit" value="Submit">
          </form>
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

            <td><form action="Actions/eliminaSponsor.php" method="POST"><input type="hidden" name="IdSponsor" value="<?php  echo $value; ?>"></input><button type="submit"> Elimina </button></form> </td>

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
 <br><br>

 <div class="collapse multi-collapse" id="sponsorizazzione">
    <p> scegli la conferenza su cui vuoi inserire la sponsorizazzione</p>
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

                
                <td><form action="Actions/paginaInserisciSponsorizazzione.php" method="POST"><input type="hidden" name="IdConferenza" value="<?php  echo $value; ?>"></input><button type="submit"> Scegli </button></form> </td>
                
        <?php
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo '<center> <h4> Non ci sono risultati </h4> </center>';
            }
        
        ?>


    <h4>Visualizza Sponsorizzazioni:</h4>
            <?php 
            
            $result = mysqli_query($db, "SELECT * FROM dispone");
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
          
</div>



    

  <div class="container textarea">
    <div class="row align-items-center justify-content-center margin-top col-12"> 
      
    <div>   
  </div>
</section>

 <?php include('./Components/footer.php'); ?> 