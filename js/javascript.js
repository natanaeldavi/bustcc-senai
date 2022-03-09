import ChartDataLabels from 'chartjs-plugin-datalabels';


// Script mudança de mapa
var cod = document.getElementById('varcodigo');
var codigoponto = cod.value;
var map = document.getElementById('map');

    switch (codigoponto) {

      case "01":
        map.src = "https://www.google.com/maps/d/u/0/embed?mid=14ys5gtTsImWzePoC8ZQNvu5DMMZPVcOk&ehbc=2E312F";
        break;

      case "02":
        map.src = "https://www.google.com/maps/d/u/0/embed?mid=11ACchmMkubP6W_QsbGjQtPcNtcumsfJg&ehbc=2E312F";
        break;

      case "03":
        map.src = "https://www.google.com/maps/d/u/0/embed?mid=1NfQvzgd5lk84bYd5c55YZoOBJf8Tdjg2&ehbc=2E312F";
        break;
    }

// Graph administração;

google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }