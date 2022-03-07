<?php
    include("conexao.php");

    $cod = $_GET['cod'];

    $inserir = "INSERT INTO tb_onibus1 (id, codigo, data) VALUES (NULL, '$cod', CURRENT_TIMESTAMP)";

    if ($mysqli->query($inserir)) {
        echo "insert_ok";
    } else {
        echo "error in insertion";
    }
?>