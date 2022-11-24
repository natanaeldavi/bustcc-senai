<?php

include("../php/conexao.php");

$consulta = "SELECT * FROM tb_onibus1 ORDER BY id DESC LIMIT 1";
$con = $mysqli->query($consulta) or die ($mysqli->error);

$result = $mysqli->query($consulta);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeveN BuS - TCC | Ônibus 01</title>

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
            <a class="nav-link" href="bus.html">Linhas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sugestoes.php">Sugestões</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../funcionarios/login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Fim Navbar -->

  <div class="container-fluid col-md-10 col-sm-10 col-10 bg-light rounded border big-card">
    <div class="row">
      <div class="col-sm-6 bus-info">
        <h1 class="title text-center text-dark" style="margin-top: 30px;"> Ônibus 01 </h1>

    <!-- Local a onde irá mostrar qual o último ponto onde o ônibus passou -->

    <!-- Retornando informação de codigo e data do ponto -->
    <?php 
    
    while($dados = mysqli_fetch_assoc($result)) {
      $cod_ponto = $dados['codigo'];
      $datahora = $dados['data'];

      $tempo = substr($datahora,0,-3);
      $hora = gmdate('H:i', strtotime( $tempo ) - strtotime( '03:00' ) );

    }

    if ($cod_ponto == "01") {
      $ponto = "Zaniboni";
      $prox_ponto = "SENAI";
    }

    if ($cod_ponto == "02") {
      $ponto = "SENAI";
      $prox_ponto = "BigBom";
    }

    if ($cod_ponto == "03") {
      $ponto = "BigBom";
      $prox_ponto = "Zaniboni";
    }    
    ?>

        <p style="margin-top: 40px;">Último ponto em que esteve: <?php echo "$ponto"?> às <?php echo "$hora" ?> </p>
        <p>Está a caminho para o ponto: <?php echo "$prox_ponto" ?> </p>
      </div>
   
      <div class="col-sm-6 map-div">
        <iframe id="map" src="https://www.google.com/maps/d/u/0/embed?mid=14ys5gtTsImWzePoC8ZQNvu5DMMZPVcOk&ehbc=2E312F" width="640" height="480" class="mapa img-fluid border rounded"></iframe>
      </div>
    </div>

    <!-- <img id="js-map" class="mapa img-fluid" src="../img/map-padrao.png" onload="trocaImg();"> -->

  </div>

  


  <!-- Passa variável php para js -->
  <input id="varcodigo" type="hidden" value="<?php echo $cod_ponto; ?>" />

  <!-- link javascript -->

  <script type="text/javascript" src="../js/javascript.js"></script>


  <!-- Footer (rodapé) -->

  <footer class="footer bottom mt-auto py-3 bg-light">
    <div class="container">
      <span class="text-muted">SeveN BuS - TCC | SENAI Mogi Guaçu - 2021/2022 &copy;</span>
    </div>
  </footer>
</body>
</html>