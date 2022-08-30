<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="\Progetto_Basi\confvirtual\css\logIn.css">
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

   

    <!-- Login Form -->
    <form  method="post" action="../inserimentoUtente.php">
      <input type="text" id="login" class="fadeIn second" name="Username" placeholder="Username">
      <input type="text" id="password" class="fadeIn third" name="Nome" placeholder="Nome">
      <input type="text" id="password" class="fadeIn third" name="Cognome" placeholder="Cognome">
      <input type="password" id="password" class="fadeIn third" name="Password" placeholder="Password">
      <input type="date" id="password" class="fadeIn third" name="DataNascita" placeholder="Data Nascita (y/m/d)">
      <input type="text" id="password" class="fadeIn third" name="LuogoNascita" placeholder="Luogo Nascita">
      <input type="submit" class="fadeIn fourth" value="Register">
    </form>

   

  </div>
</div>