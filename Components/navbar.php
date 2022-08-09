<nav class="navbar navbar-expand-lg navbar-light bg-white col-lg-12">
  <div class="container">
    <a class="navbar-brand" href="/Progetto_Basi/confvirtual/index.php">
      <h2> <b> CONFVIRTUAL </b> </h2> 
    </a>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
    <?php 
    session_start();
    if (isset($_SESSION['utente'])) {
    ?>
        <li class="nav-item">
          <a class="nav-link" href="/Progetto_Basi/confvirtual/Actions/Authentication/PaginaUtente.php"> Il mio profilo </a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="/Progetto_Basi/confvirtual/Actions/Authentication/LogOut.php"> Esci </a>
        </li>
    <?php
    } else {
    ?>
        <li class="nav-item">
          <a class="nav-link" href="/Progetto_Basi/confvirtual/Actions/Authentication/Registrati.php">Registrati</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="/Progetto_Basi/confvirtual/Actions/Authentication/LogIn.php">Log In</a>
        </li>
    <?php
    }
    ?>
      </ul>
    </div>
  </div>
</nav>