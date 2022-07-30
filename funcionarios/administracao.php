<?php 

include("../php/conexao.php");
session_start();



if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['username']) == true))
{
  header('location: ../index.html');
  }


// Consulta Onibus 01

$consulta_bus01 = "SELECT * FROM tb_onibus1 ORDER BY id DESC LIMIT 1";
$con_bus01 = $mysqli->query($consulta_bus01) or die ($mysqli->error);

$result_bus01 = $mysqli->query($consulta_bus01);

// Consulta Onibus 02

$consulta_bus02 = "SELECT * FROM tb_onibus2 ORDER BY id DESC LIMIT 1";
$con_bus02 = $mysqli->query($consulta_bus02) or die ($mysqli->error);

$result_bus02 = $mysqli->query($consulta_bus02);

while ($onibus01 = mysqli_fetch_assoc($result_bus01)) {
    $estado_bus01 = $onibus01['estado'];
}

while ($onibus02 = mysqli_fetch_assoc($result_bus02)) {
    $estado_bus02 = $onibus02['estado'];
}

// Estados possíveis: 01 (Operando), 02 (parado)

$operando = 0;
$parado = 0;

if ($estado_bus01 == "01") {
    $operando++;
} else if ($estado_bus01 == "02") {
    $parado++;
}

if ($estado_bus02 == "01") {
    $operando++;
} else if ($estado_bus02 == "02") {
    $parado++;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeveN BuS - TCC</title>

    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- link scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <!--- link css -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css">

    <!-- link fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<body class="body-adm">

  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg bg-light navbar-light rounded-bottom" aria-label="Twelfth navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link disabled" aria-current="page" href="#">SeveN BuS - TCC</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../php/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <!-- Início dashboard -->

  <div class="row">
    <div class="container-fluid text-center adm-card col-sm-3">
        <br>
        <br>
        <br>
        <h2>Seja bem vindo,</h2>
        <h4><?php echo $_SESSION['nome']; ?></h4>
        <h5>Cargo: <?php echo $_SESSION['cargo']; ?></h5>
    </div>

    <div class="container-fluid text-center adm-card col-sm-3">
        <br>
        <br>
        <br>
        <h3>Funcionários:</h3>
        <a href="cadastrar.php" class="btn btn-secondary btn-cadastro">Cadastrar</a>
        <a href="excluir.php?nome=" class="btn btn-secondary btn-cadastro">Excluir</a>
    </div>

    <div class="container-fluid text-center adm-card col-sm-3">
        <h5 style="margin-top: 0.7em;" >Número de veículos operantes:</h5>
        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Ônibus', 'Estado'],
                    ['Operando',     <?php echo $operando; ?>],
                    ['Parados',     <?php echo $parado; ?>],
                ]);

            var options = {
                pieHole: 0.4,
                'backgroundColor': 'transparent'
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
            }
    </script>
    </script>
        <div id="donutchart" style="width: 400px; 
        height: 400px; 
        margin-left: -5em; 
        margin-top: -4em;
        "></div>
    </div>

  </div>

  <div class="row">

    <div class="container-fluid text-center adm-card col-sm-3">
          <br>
          <br>
          <br>
          <h3>Feedback da comunidade:</h3>
          <a href="view-sugestoes.php" class="btn btn-secondary btn-cadastro">Ver sugestões</a>
      </div>

  </div>



  <!-- Footer (rodapé) -->
  
  <div class="fim-page"></div>

  <footer class="footer mt-auto py-3 bg-light">
    <div class="container">
      <span class="text-muted">SeveN BuS - TCC | SENAI Mogi Guaçu - 2021 &copy;</span>
    </div>
  </footer>

  <!-- link javascript -->
  <script src="../js/javascript.js"></script>
</body>
</html>

<?php 

 ?>