<nav class="navbar navbar-expand-lg navbar-light col-lg-12" style="background-color: #E0E0E0;">
  <div class="container">
    <a class="navbar-brand" href="/Progetto_Basi/confvirtual/Home.php">
      <h2> <b> CONFVIRTUAL </b> </h2> 
    </a>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
    <?php 
   

    // Check the session
    $status = session_status();
    if ($status == PHP_SESSION_NONE) {
      session_start();
    } else
    if ($status == PHP_SESSION_ACTIVE || $status == PHP_SESSION_DISABLED) {
      session_destroy();
      session_start();
    }
  
    if (isset($_SESSION['utente'])) {
    ?>
    <?php
        if($_SESSION["tipo"] == 'Amministratore'){
            echo '<li class="nav-item">
                 <a class="nav-link" href="/Progetto_Basi/confvirtual/Admin.php"> Il mio profilo </a>
                </li> 
                <li class="nav-item">
                 <a class="nav-link" href="/Progetto_Basi/confvirtual/Actions/Authentication/LogOut.php"> Esci </a>
                 </li>';
        } 
        else if($_SESSION["tipo"] == 'Utente'){
          echo '<li class="nav-item">
              <a class="nav-link" href="/Progetto_Basi/confvirtual/Home.php"> Il mio profilo </a>
               </li> 
               <li class="nav-item">
               <a class="nav-link" href="/Progetto_Basi/confvirtual/Actions/Authentication/LogOut.php"> Esci </a>
               </li>';
        }
        else if($_SESSION["tipo"]  == 'Speaker'){
          echo '<li class="nav-item">
              <a class="nav-link" href="/Progetto_Basi/confvirtual/Home.php"> Il mio profilo </a>
               </li> 
               <li class="nav-item">
               <a class="nav-link" href="/Progetto_Basi/confvirtual/Actions/Authentication/LogOut.php"> Esci </a>
               </li>';
        }
        else if($_SESSION["tipo"]  == 'Presenter'){
          echo '<li class="nav-item">
              <a class="nav-link" href="/Progetto_Basi/confvirtual/Home.php"> Il mio profilo </a>
               </li> 
               <li class="nav-item">
               <a class="nav-link" href="/Progetto_Basi/confvirtual/Actions/Authentication/LogOut.php"> Esci </a>
               </li>';
        }
        
        ?>
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