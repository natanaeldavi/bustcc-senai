<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeveN BuS - TCC | Login</title>

    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- link scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!--- link css -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css">

    <!-- link fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">

</head>
<body class="bg-gray">


  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light rounded-bottom" aria-label="Twelfth navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../index.html">SeveN BuS - TCC</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/bus.html">Linhas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/sugestoes.php">Sugestões</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container bg-light login-card text-center border">
    <form action="../php/login.php" method="post">
      <h2 class="text-center">Login Funcionários</h2>

      <?php if(isset($_GET['error'])) {?>
        <p class="login-erro"><?php echo $_GET['error'];?></p>
      <?php } ?>

      <label>Usuário</label><br>
      <input type="text" name="username" placeholder="Usuário" class="border rounded input-text"><br>
      <label>Senha</label><br>
      <input type="password" name="senha" placeholder="Senha" class="border rounded input-text"> <br>
      <input class="btn btn-dark rounded botao-entrar" type="submit" value="Entrar">
    </form>
  </div>

  <div class="fim-page"></div>

  <!-- Footer (rodapé) -->

  <footer class="footer mt-auto py-3 bg-light fixed-bottom">
    <div class="container">
      <span class="text-muted">SeveN BuS - TCC | SENAI Mogi Guaçu - 2021/2022 &copy;</span>
    </div>
  </footer>

  <!-- link javascript -->
  <script src="../js/javascript.js"></script>
</body>
</html>