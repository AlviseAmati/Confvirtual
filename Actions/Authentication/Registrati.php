<?php 
session_start();


?>

<section>
<br> <br>
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <?php 
        if(isset($_SESSION["ErrorRegistrazione"])){
          echo $_SESSION["ErrorRegistrazione"];
          unset($_SESSION["ErrorRegistrazione"]);
          echo "C'e stato un errore";
        }
      ?>
      <h2> Registrazione </h2>
      <form name="registerForm" method="post" action="./inserimentoUtente.php" class="form-control"> <br>   
      <b> Username *: </b> <br>
        <input type="text" name="username"> <br> <br>       
      <b> Nome *: </b> <br>
        <input type="text" name="nome"> <br> <br>        
      <b> Cognome *: </b> <br>
        <input type="text" name="cognome"> <br> <br>
      <b> Password *: </b> <br>
        <input type="password" name="password"> <br>
      <b> Data Nascita *: </b> <br>
        <input type="date" name="datanascita"> <br>
      <b> Luogo Nascita *: </b> <br>
        <input type="text" name="luogonascita"> <br>

        <div> 
        
        </div>  
        <input type="submit" name="Iscriviti" value="Iscriviti" class='btn btn-danger btn-lg'>
      </form>
    </div>
  </div>
</section>