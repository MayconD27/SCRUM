<?php
    include_once "bd.php";
    session_start();
    $id =  $_SESSION['id'];
    $usuarioLogado = isset($_SESSION['logado']) ?  $_SESSION['logado'] : false;


    $nomeUsuario = isset($_SESSION['nome']) ?  $_SESSION['nome'] : 'Sem nome';


    $sql = "SELECT SUM(demandaTotal) AS 'qntTotal',SUM(demandaConcluida) AS 'qntConcluida' FROM sprint WHERE usuario = $id";
    $resultado = $bd->prepare($sql);
    $resultado->execute();
    $registrosQnt = $resultado->fetchAll();

    $sql = "SELECT MAX(demandaTotal) AS 'vMax',MAX(demandaConcluida) AS 'vMaxC' FROM sprint WHERE usuario = $id";
    $resultado =$bd->prepare($sql);
    $resultado->execute();
    $registroMM = $resultado->fetchAll();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/portal.css">
    <link rel="stylesheet" href="css/dash.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="js/echarts.min.js"></script>
    
</head>

<body>

        <input type="checkbox" id="check" >
        <label for="check" ><i class="bi bi-list" id="icone"></i></label>
        <header>
        <?php  echo "<h2 id='nome'>$nomeUsuario</h2>" ?><i class="bi bi-person-fill"></i>
        </header>

    <div class="barra">	
        <nav>
            <a href="index.php"><div class="link"><i class="bi bi-diagram-3-fill"></i> Sprint</div></a>
            <a href="dashboard.php"><div class="link"><i class="bi bi-graph-down"></i>  Gráfico de Bundown </div></a>

            
         
        </nav>	
        <a href="logout.php" class="sair"><i class="bi bi-house"></i><p>sair</p></a>
    </div>

    <div id="dashboard">
        
        <div class="novidades">
          
             <span>Novidades</span>
             <marquee behavior='' direction=''>
             <?php
                 $sql = "SELECT * FROM sprint WHERE usuario = $id ORDER BY dataSprint DESC ";
                 $resultado = $bd->prepare($sql);
                 $resultado->execute();
                 $registrosNovidade = $resultado->fetchAll();
                 if(count ($registrosNovidade)>0){
                    $descri = $registrosNovidade[0]['descricao'];
                    echo "$descri"; 
                 }

            ?>
            </marquee>
        </div>

        <div class="itens">
            <span>
                <h3>Quantidade de demandas</h3>
                <?php
                  $qntDemandas = $registrosQnt[0]['qntTotal'];
                  echo " <p id='ntDemandas' data-from='0' data-to='$qntDemandas'
                  data-speed='2000' data-refresh-interval='50'  class='time'></p>";

                ?>
                <i class="bi bi-diagram-3-fill"></i>

            </span>

            <span>
                <h3>Demandas concluidas</h3>
                <?php
                 
                  $qntConcluida = $registrosQnt[0]['qntConcluida'];
                  echo " <p id='ntDemandas' data-from='0' data-to='$qntConcluida'
                  data-speed='2000' data-refresh-interval='50'  class='time'></p>";

                ?>
                <i class="bi bi-check-circle"></i>
            </span>

            <span>
                <h3>Demandas em atraso</h3>
                <?php
                   $qntAtraso = $qntDemandas-$qntConcluida;
                  echo " <p id='ntDemandas' data-from='0' data-to='$qntAtraso'
                  data-speed='2000' data-refresh-interval='50'  class='time'></p>";

                ?>
                <i class="bi bi-x-circle"></i>
            </span>
        </div>
        <div class="itens maior">
        <span>
                <h3>Maior quantidade de tarefa por sprint</h3>
                <?php
                  $qntMax = $registroMM[0]['vMax'];
                  echo " <p id='ntDemandas' data-from='0' data-to='$qntMax'
                  data-speed='2000' data-refresh-interval='50'  class='time'></p>";

                ?>
                <i class="bi bi-arrow-up-right"></i>

            </span>

            <span>
                <h3>Maior quantidade de tarefa concluidas  por sprint</h3>
                <?php
                 
                  $qntMaxC = $registroMM[0]['vMaxC'];
                  echo " <p id='ntDemandas' data-from='0' data-to='$qntMaxC'
                  data-speed='2000' data-refresh-interval='50'  class='time'></p>";

                ?>
                <i class="bi bi-hand-thumbs-up"></i>
            </span>

        </div>

         <div id="grafic"></div>


        
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/jqueryCoutTo.js"></script>
    <script type="text/javascript">
      $('.time').countTo();
 
      var tarefas=[];
      var ideal = [];
      var real=  [];
      var totalD= [];
      fetch("grafic.php")

      .then(resp => resp.json())
      .then((resp) => {
        resp.forEach((scrum) => {
            // aqui coloca o que precisa fazer de cada sprint
            tarefas.push(scrum.sprint)
            var dC=scrum.demandaConcluida;
            var dT=scrum.demandaTotal;
            totalD.push(scrum.demandaTotal)
            real.push((dT-dC));            
        })
        totalTarefas = 100/tarefas.length;
        var j =-1;
        for(var i=tarefas.length; i>0;i--){
          j++
          ideal[j]=totalTarefas*i;
          real[j]= ideal[j]+(totalTarefas/(totalD[j])*real[j]);
        }
        
        real.push(0);
        ideal.push(0);
        tarefas.push('Concluido')
        var myChart = echarts.init(document.getElementById('grafic'));
        var option = {
                
          tooltip: {},
          legend: {
            data: ['Tempo de Trabalho Ideal', 'Tempo de Trabalho Real']
          },
          xAxis: {
            data: tarefas
          },
          yAxis: {},
          series: [
            {
              name: 'Tempo de Trabalho Ideal',
              type: 'line',
              data: ideal,
              color: '#ccb5a5',
              smooth: true
            },
            {
              name: 'Tempo de Trabalho Real',
              type: 'line',
              data: real,
              color: '#592c0c',
              smooth: true
            }
          ]
        };

            // Display the chart using the configuration items and data just specified.
        myChart.setOption(option);

      })
      
     


    </script>
</body>

</html>