<html>
  <head>
    <script type="text/javascript" src="/programacion3/gestion_user/js/charts-loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Masculino',     11],
          ['Femenino',      6],
          ['Otro',  4],

        ]);

        var options = {
          title: 'Genero',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 515px; height: 430px;"></div>
  </body>
</html>