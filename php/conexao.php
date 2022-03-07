<?php

    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "bdarduino";

    $mysqli = new mysqli($host, $usuario, $senha, $bd);

    if($mysqli->connect_errno){
        echo "Falha na conexão";
    }

?>