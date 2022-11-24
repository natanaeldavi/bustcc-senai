<?php
    include("conexao.php");

    $cod_ponto = $_GET['cod'];
    $bus = $_GET['bus'];
    $estado = $_GET['estado'];

    if ($bus == "01") {
        $tabela = "tb_onibus1";
    } else if ($bus == "02") {
        $tabela = "tb_onibus2";
    }

    if ($cod_ponto == "01" or $cod_ponto == "1") {
        $cod = 01;
    }

    if ($cod_ponto == "02" or $cod_ponto == "2") {
        $cod = 02;
    }

    if ($cod_ponto == "03" or $cod_ponto == "3") {
        $cod = 03;
    }

    $inserir = "INSERT INTO $tabela (id, codigo, estado, data) VALUES (NULL, '$cod', '$estado', CURRENT_TIMESTAMP)";

    if ($mysqli->query($inserir)) {
        echo "insert_ok";
    } else {
        echo "error in insertion";
    }
?>