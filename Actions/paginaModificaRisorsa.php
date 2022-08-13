<?php require('../Components/head.php'); ?>
<?php require('../Components/navbar.php'); ?>
<?php require('../Actions/connessioneDB.php'); ?>

<?php $_SESSION['IdPresentazione'] = $_POST['IdPresentazione'];?>



<br>
<td><button class="btn btn-outline-secondary" type="submit"><a href="./paginaRisorsa.php" style="color:grey;"> torna indietro</a> </button></form> </td>

<section>
  <div class="col-12">
        

        <h3> Modifica Risorsa: <h3>
            <form method="POST" action="./modificaRisorsa.php">
                <label for="LinkWeb">Link Web:</label><br>
                <input type="text" id="LinkWeb" name="LinkWeb" value="<?php  echo $_POST['LinkWeb']; ?>"><br>
                <label for="Descrizione">Descrizione:</label><br>
                <input type="text" id="Descrizione" name="Descrizione" value="<?php  echo $_POST['Descrizione']; ?>"><br><br>
                <input type="hidden" name="IdRisorsa" value="<?php  echo $_POST['IdRisorsa']; ?>"></input>
                <input type="hidden" name="IdPresentazione" value="<?php  echo $_POST['IdPresentazione']; ?>"></input>
                <input type="hidden" name="Username" value="<?php  echo $_POST['Username']; ?>"></input>
                <input type="submit" value="Submit">
            </form>

        

  </div>
</section>