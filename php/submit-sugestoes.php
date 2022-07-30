<?php
    include("conexao.php");

    if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['tema']) && isset($_POST['sugestao'])) {

        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $nome = validate($_POST['nome']);
        $email = validate($_POST['email']);
        $tema = validate($_POST['tema']);
        $sugestao = validate($_POST['sugestao']);

        if (empty($nome)) {
            header("Location: ../pages/sugestoes.php?error=É necessário digitar um nome");
            exit();
        } else if (empty($email)) {
            header("Location: ../pages/sugestoes.php?error=É necessário digitar um email");
        } else if (empty($tema)) {
            header("Location: ../pages/sugestoes.php?error=É necessário digitar um tema");
        } else if (empty($sugestao)) {
            header("Location: ../pages/sugestoes.php?error=É necessário digitar uma mensagem");
        } else {
            $sql = "INSERT INTO `tb_sugestoes` (`nome`, `email`, `tema`,  `sugestao`, `data`) VALUES ('$nome', '$email', '$tema', '$sugestao', CURRENT_TIMESTAMP);";

            $result = mysqli_query($mysqli, $sql);

            header("Location: ../pages/sugestoes.php?sucess=Mensagem enviada");
        }

    } else {
        header("Location: ../pages/sugestoes.php");
        exit();
    }
?>