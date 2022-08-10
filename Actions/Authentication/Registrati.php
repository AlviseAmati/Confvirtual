<?php require('../../components/head.php'); ?>
<?php require('../../components/navbar.php'); ?>

<section>
<br> <br>
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <h2> Registrazione </h2>
      <form method="post" action="../inserimentoUtente.php" class="form-control"> <br>
      <b> Username : </b> <br>
      <input type="text" name="Username"> <br> <br>
      <b> Nome: </b> <br>
      <input type="text" name="Nome"> <br> <br>
      <b> Cognome : </b> <br>
      <input type="text" name="Cognome"> <br> <br>
      <b> Password: </b> <br>
      <input type="password" name="Password"> <br> <br>
      <b> Data di nascita : </b> <br>
      <input value="aaaa-mm-dd" type="text" name="DataNascita"> <br> <br>
      <b> Luogo di nascita: </b> <br>
      <input type="text" name="LuogoNascita"> <br> <br>
      <input type="submit"  value="Registrati" class='btn btn-danger btn-lg'>
      </form>
    </div>
  </div>
</section>

<!--<?php require('../../components/footer.php'); ?>-->