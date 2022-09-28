 <?php
    
    if(isset($_SESSION['utente']) && isset($_SESSION['tipo'] ) ){

        #utente e ok ed e loggato

        


        if($_SESSION['Pagina'] == $_SESSION['tipo'] || $_SESSION['Pagina'] == 'Home'){  #controllo tipo utente e tipo pagina

            #ok
        }
        else { 
        header("location: /Progetto_Basi/confvirtual/Home.php");
        }
  
    }
    else{
        echo '<script type="text/javascript">
            alert("Sessione scaduta");
            location.href = "/Progetto_Basi/confvirtual/index.php";
          </script>';
    }
    
      
    
?>