 <?php
    
    if(isset($_SESSION['utente']) && isset($_SESSION['tipo']) ){

        #utente e ok ed e loggato

    }
    else{
        echo '<script type="text/javascript">
            alert("Sessione scaduta");
            location.href = "/Progetto_Basi/confvirtual/index.php";
          </script>';
    }
?>