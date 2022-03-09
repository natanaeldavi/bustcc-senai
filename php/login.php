<?php
    include("conexao.php");

    session_start();

    if (isset($_POST['username']) && isset($_POST['senha'])) {

        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $username = validate($_POST['username']);
        $senha = validate($_POST['senha']);

        if (empty($username)) {
            header("Location: ../funcionarios/login.php?error=É necessário digitar um usuário");
            exit();
        } else if (empty($senha)) {
            header("Location: ../funcionarios/login.php?error=É necessário digitar uma senha");
        } else {
            $sql = "SELECT * FROM tb_funcionarios WHERE username='$username' AND senha='$senha'";

            $result = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['username'] == $username && $row['senha'] == $senha) {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nome'] = $row['nome'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['cargo'] = $row['cargo'];
                    if ($row['tipo'] == "adm") {
                        header("Location: ../funcionarios/administracao.php");
                        exit();
                    } else if ($row['tipo'] == "motorista") {
                        header("Location: ../funcionarios/motorista.php");
                        exit();
                    }
                    
                }
            } else {
                header("Location: ../funcionarios/login.php?error=Usuário e/ou senha inválida.");
                exit();
            }
        }

    } else {
        header("Location: ../funcionarios/login.php");
        exit();
    }
?>