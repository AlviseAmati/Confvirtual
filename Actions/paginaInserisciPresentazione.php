<?php require('../Components/head.php'); ?>
<?php require('../Components/navbar.php'); ?>
<?php require('../Actions/connessioneDB.php'); ?>

<?php $_SESSION['IdSessione'] = $_POST['IdSessione'];?>
<title>Inserisci Presentazione</title>

<td><button  class="btn btn-outline-secondary" type="submit" style="margin: 10px 10px 10px;"><a href="../Admin.php" style="color:grey;"> Torna in dietro</a> </button></form> </td>



<section>
  <div class="col-12">
    

 


  <h3>Inserimento presentazione in una Sessione:</h3>
          <form method="POST" action="./inserisciPresentazione.php">
            <label for="NumSequenze">Numero Sequenze:</label><br>
            <input type="text" id="NumSequenze" name="NumSequenze" value="5"><br>
            <label for="OrarioFine">Orario Fine:</label><br>
            <input type="time" id="OrarioFine" name="OrarioFine" value="10:00:00"><br>
            <label for="OrarioInizio">Orario Inizio:</label><br>
            <input type="time" id="OrarioInizio" name="OrarioInizio" value="08:00:00"><br>
            <label for="Titolo">Titolo:</label><br>
            <input type="text" id="Titolo" name="Titolo" value="Art/Tout 1"><br>
            <label for="Pdf">Pdf:</label><br>
            <input type="text" id="Pdf" name="Pdf" value="pdf1"><br>
            <label for="NumeroPagine">Numero Pagine:</label><br>
            <input type="text" id="NumeroPagine" name="NumeroPagine" value="23"><br>
            <label for="Abstract">Abstract:</label><br>
            <input type="text" id="Abstract" name="Abstract" value="..."><br>
            <label for="Tipo">Tipo:</label><br>
            <select name="Tipo" >
            <option  value="Articolo" selected="selected">Articolo </option>
            <option  value="Tutorial">Tutorial </option>
            </select><br><br>
            

            <input type="submit" value="Submit">
          </form>






  </div>
</section>