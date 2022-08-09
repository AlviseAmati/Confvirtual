<?php
include ('connessioneDB.php'); 

function ControlloModifica($sql_link, $query, $fraseSi, $fraseNo) { #redirect
    mysqli_query($sql_link, $query);

    if (mysqli_affected_rows($sql_link) > 0) {
        echo "<script>
        alert('$fraseSi');
        location.href= '/Progetto_Basi/confvirtual/Admin.php';
        </script>";
    } else {
        echo "<script>
        alert('$fraseNo');
        location.href= '/Progetto_Basi/confvirtual/Admin.php';
        </script>";
    }
}






















function ControllaStringa($newname, $name) {
    if( !empty($newname) ) {
        return $newname;
    } else {
        return $name;
    } 
}


function StampaFormModifica($sql_link, $query, $action, $name) {
    $result = mysqli_query($sql_link, $query);
    $arr = mysqli_fetch_array($result);
    $num = $result->fetch_fields();

    echo "
        <h2> Modifica Informazioni " . $name . "</h2>
        <h5> Modifica i campi che desideri modificare e salva </h5>"; 

    if(mysqli_num_rows($result) > 0) {
        echo "
        <form method='post' action='$action' class='form-control'>";
            for ($i = 1; $i < (sizeof($arr)/2); $i++) {
                $value = $arr[$i];
                $col = $num[$i] -> name; 
                $type = $num[$i] -> type;
                $typename = getDataType($type);

        echo " 
            <div class='mb-3 col-5'>
                <label for='".$col."Form' class='form-label'>" . $col . " ( ". $typename . " ) </label>
                <input type="; checkType($typename, $col); echo" class='form-control input-area' name='".$col."' id='".$col."Form' placeholder= '$value ' />
            </div>";
        }

        echo "
            <input type='submit' class='btn btn-danger btn-lg' name='Salva' value='Salva'> </input>
            </form> <br>";
                
    } else {
        echo '<center> <h4> Non ci sono risultati </h4> </center>';
    }
}

function StampaFormInserisci($sql_link, $query, $action, $name) {
    $result = mysqli_query($sql_link, $query);
    $arr = mysqli_fetch_array($result);
    $num = $result->fetch_fields();

    echo " 
        <h2> Inserimento " . $name . "</h2>
        <h5> Completa i campi e salva </h5>";

    if(sizeof($arr) > 0) {
        echo "
        <form method='post' action='$action' class='form-control'>";
            for ($i = 0; $i < (sizeof($arr)/2); $i++) {
                $value = $arr[$i];
                $col = $num[$i] -> name; 
                $type = $num[$i] -> type;
                $typename = getDataType($type);
            
                echo " 
                    <div class='mb-3 col-5'>
                        <label for='".$col."Form' class='form-label'>" . $col . " ( ". $typename . " ) </label>
                        <input type="; checkType($typename, $col); echo" class='form-control input-area' name='".$col."' id='".$col."Form' required/>
                    </div>";
            }

        echo "
            <input type='submit' class='btn btn-danger btn-lg' name='Salva' value='Salva'> </input>
            </form> <br>";
                
    } else {
        echo '<center> <h4> Non ci sono risultati </h4> </center>';
    }
}

function getDataType($name) {
    $mysql_data_type_hash = array(
        1=>'tinyint',
        2=>'smallint',
        3=>'int',
        4=>'float',
        5=>'double',
        7=>'timestamp',
        8=>'bigint',
        9=>'mediumint',
        10=>'date',
        11=>'time',
        12=>'datetime',
        13=>'year',
        16=>'bit',
        253=>'varchar',
        254=>'char',
        246=>'decimal'
    );
    
    $dataString   = $mysql_data_type_hash[$name];
    return $dataString;
}

function checkType($type, $name) {
    if($name == 'Email') {
        echo "mail";
    } else if (strpos($name, 'Data') === 0 ) {
        echo "date";
    } else if ($type == 'int') {
        echo "number";
    } else {
        echo "text";
    }
}

function StampaFormModificaProfilo($sql_link, $query, $action) {
    $result = mysqli_query($sql_link, $query);
    $arr = mysqli_fetch_array($result);
    $num = $result->fetch_fields();

    if(mysqli_num_rows($result) > 0) {
        echo "
        <form method='post' action='$action' class='form-control'>";
            for ($i = 2; $i < (sizeof($arr)/2); $i++) {
                $value = $arr[$i];
                $col = $num[$i] -> name; 
                $type = $num[$i] -> type;
                $typename = getDataType($type);

        echo " 
            <div class='mb-3 col-5'>
                <label for='".$col."Form' class='form-label'>" . $col .  " ( ". $typename . " ) </label>
                <input type='text' class='form-control input-area' name='".$col."' id='".$col."Form' placeholder= '$value ' required/>
            </div>";
        }

        echo "
            <input type='submit' class='btn btn-danger btn-lg' name='Salva' value='Salva'> </input>
            </form> <br>";       
    } 
}
