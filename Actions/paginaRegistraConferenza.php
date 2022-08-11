<?php require('./connessioneDB.php'); ?>
<?php  session_start(); ?>

<title>Homepage</title>

<h1 style="text-align: center;"> Registrati ad una conferenza
<?php
 echo $_SESSION["utente"];
?>
</h1>

<section>
  <div class="col-12">
    <form method="POST" action="./registraConferenza.php">
        <label for="IdConferenza">IdConferenza:</label><br>
        <input type="text" id="IdConferenza" name="IdConferenza" value="1"><br>
        <input type="submit" value="Submit">
        </form>
  </div>
</section>