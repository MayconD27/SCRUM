<?php
    session_start();
    $usuarioLogado = isset($_SESSION['logado']) ?  $_SESSION['logado'] : false;


    $nomeUsuario = isset($_SESSION['nome']) ?  $_SESSION['nome'] : 'Sem nome';
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal do Usuario</title>
    <link rel="stylesheet" href="css/portal.css">
    <link rel="stylesheet" href="css/dash.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="js/echarts.min.js"></script>
    
</head>

<body>

        <input type="checkbox" id="check" >
        <label for="check" ><i class="bi bi-list" id="icone"></i></label>
        <header>
        <?php  echo "<h2>$nomeUsuario</h2>" ?><i class="bi bi-person-fill"></i>
        </header>

    <div class="barra">	
        <nav>
            <a href="index.php"><div class="link"><i class="bi bi-diagram-3-fill"></i> Sprint</div></a>
            <a href="dashboard.php"><div class="link"><i class="bi bi-graph-down"></i>  Gráfico de Bundown </div></a>

            
         
        </nav>	
        <a href="" class="sair"><i class="bi bi-house"></i><p>sair</p></a>
    </div>

    <div id="dashboard">
        
        <div class="novidades">
            <span>Novidades</span>
            <marquee behavior="" direction="">
                Texto de exemplo de adição de nova srpint
            </marquee>
        </div>

        <div class="itens">
            <span>
                <h3>Quantidade de Demandas</h3>
                <?php
                  $teste1 = 100;
                  echo " <p id='ntDemandas' data-from='0' data-to='$teste1'
                  data-speed='5000' data-refresh-interval='50'  class='time'></p>";

                ?>
                <i class="bi bi-diagram-3-fill"></i>

            </span>

            <span>
                <h3>Demandas Concluidas</h3>
                <?php
                  $teste2 = 70;
                  echo " <p id='ntDemandas' data-from='0' data-to='$teste2'
                  data-speed='5000' data-refresh-interval='50'  class='time'></p>";

                ?>
                <i class="bi bi-check-circle"></i>
            </span>

            <span>
                <h3>Demandas em atraso</h3>
                <?php
                  $teste3 = 30;
                  echo " <p id='ntDemandas' data-from='0' data-to='$teste3'
                  data-speed='5000' data-refresh-interval='50'  class='time'></p>";

                ?>
                <i class="bi bi-x-circle"></i>
            </span>
        </div>
         <div id="grafic"></div>


        
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/jqueryCoutTo.js"></script>
    <script type="text/javascript">
      $('.time').countTo();
        var sprint = ['sprint1','sprint2','sprint3', 'sprint4', 'sprint5', 'sprint6'];

        var real = [110, 80, 60, 45, 25, 0]
        
        var ideal = [100, 80, 60, 40, 20, 0];

      var myChart = echarts.init(document.getElementById('grafic'));
      var option = {
        tooltip: {},
        legend: {
          data: ['ideal', 'real']
        },
        xAxis: {
          data: sprint
        },
        yAxis: {},
        series: [
          {
            name: 'ideal',
            type: 'line',
            data: ideal,
            color: '#ccb5a5',
            smooth: true
          },
          {
            name: 'real',
            type: 'line',
            data: real,
            color: '#592c0c',
            smooth: true
          }
        ]
      };

      // Display the chart using the configuration items and data just specified.
      myChart.setOption(option);
    </script>
</body>

</html>