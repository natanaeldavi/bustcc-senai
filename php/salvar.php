<?php
    include("conexao.php");

    $cod = $_GET['cod'];
    $bus = $_GET['bus'];
    $estado = $_GET['estado'];

    if ($bus == "01") {
        $tabela = "tb_onibus1";
    } else if ($bus == "02") {
        $tabela = "tb_onibus2";
    }

    $inserir = "INSERT INTO $tabela (id, codigo, estado, data) VALUES (NULL, '$cod', '$estado', CURRENT_TIMESTAMP)";

    if ($mysqli->query($inserir)) {
        echo "insert_ok";
    } else {
        echo "error in insertion";
    }
?>