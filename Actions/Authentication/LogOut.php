<?php
    session_start();
    session_unset();
    session_destroy();
    echo '<script type="text/javascript">
        location.href = "/Progetto_Basi/confvirtual/index.php";
      </script>';
    exit();
?>