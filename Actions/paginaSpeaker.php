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
     <form method="POST" action="Actions/inserisciAffiliazioneUni.php">
        <label for="FotoSpeaker">Nome Universita:</label><br>
        <select id="cars" name="carlist" form="carform">
            <?php 
            $result = mysqli_query($db, "SELECT * FROM affiliazioneuniversita");
            while ($row = $result->fetch_array()){
                echo '<option value="'.$row[1].' '.$row[2].'">'.$row[1].' '.$row[2].'</option>';
            }
            
            ?>
        </select><br><br>
        <input type="submit" value="Submit">
     </form>

     


  </div>
</section>