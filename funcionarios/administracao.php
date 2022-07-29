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

    <link rel="stylesheet" href="../css/administracao.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- link fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<main>

  <!-- Navbar -->

  <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <img src="../img/busicon.png" class="bi me-2" width="32" height="32">
      <span class="fs-4">Administração</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#"/></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#"/></svg>
          Banco de dados
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#"/></svg>
          Ônibus
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#"/></svg>
          Pontos
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="../img/busicon.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?php echo $_SESSION['nome']; ?></strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="../php/logout.php">Sign out</a></li>
      </ul>
    </div>
  </div>
  <div class="b-example-divider"></div>

    <!-- Início dashboard -->

  <div class="row">
    <div class="container-fluid text-center adm-card col-sm-5">
        <br>
        <br>
        <h2>Seja Bem vindo,</h2>
        <h4><?php echo $_SESSION['nome']; ?></h4>
        <h5>Cargo: <?php echo $_SESSION['cargo']; ?></h5>
    </div>

    <div class="container-fluid text-center adm-card col-sm-5">
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

</main>

  <!-- Footer (rodapé) -->

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