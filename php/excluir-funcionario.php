<?php
    include("conexao.php");

    session_start();

    if (isset($_POST['id'])) {

        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $id = validate($_POST['id']);

        if (empty($id)) {
            header("Location: ../funcionarios/cadastrar.php?error=É necessário digitar um nome");
            exit();
        } else {

            $sql = "DELETE FROM tb_funcionarios WHERE id='$id'";

            $result = mysqli_query($mysqli, $sql);

            header("Location: ../funcionarios/excluir.php?nome=");
            exit();
        }

    } else {
        header("Location: ../funcionarios/excluir.php?nome=");
        exit();
    }
?>