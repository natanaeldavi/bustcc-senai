<?php
    include("conexao.php");

    if (isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['tipo']) && isset($_POST['cargo']) && isset($_POST['username']) && isset($_POST['senha'])) {

        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $nome = validate($_POST['nome']);
        $cpf = validate($_POST['cpf']);
        $tipo = validate($_POST['tipo']);
        $cargo = validate($_POST['cargo']);
        $username = validate($_POST['username']);
        $senha = validate($_POST['senha']);

        if (empty($nome)) {
            header("Location: ../funcionarios/cadastrar.php?error=É necessário digitar um nome");
            exit();
        } else if (empty($cpf)) {
            header("Location: ../funcionarios/cadastrar.php?error=É necessário digitar um CPF");
        } else if (empty($tipo)) {
            header("Location: ../funcionarios/cadastrar.php?error=É necessário digitar um TIPO");
        } else if (empty($cargo)) {
            header("Location: ../funcionarios/cadastrar.php?error=É necessário digitar um cargo");
        } else if (empty($username)) {
            header("Location: ../funcionarios/cadastrar.php?error=É necessário digitar um nome de usuário");
        } else if (empty($senha)) {
            header("Location: ../funcionarios/cadastrar.php?error=É necessário digitar uma senha");
        } else {
            $sql = "INSERT INTO `tb_funcionarios` (`id`, `username`, `senha`, `nome`, `cpf`, `tipo`, `cargo`) VALUES (NULL, '$username', '$senha', '$nome', '$cpf', '$tipo', '$cargo');";

            $result = mysqli_query($mysqli, $sql);

            header("Location: ../funcionarios/cadastrar.php?sucess=Cadastro concluído");
        }

    } else {
        header("Location: ../funcionarios/cadastrar.php");
        exit();
    }
?>