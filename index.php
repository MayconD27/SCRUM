<?php
    session_start();
    $usuarioLogado = isset($_SESSION['logado']) ?  $_SESSION['logado'] : false;

    if($usuarioLogado== false){
        header('location: login.php');
        exit;
    }

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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    
</head>

<body>

        <input type="checkbox" id="check" checked>
        <label for="check" ><i class="bi bi-list" id="icone"></i></label>
        <header>
          <?php  echo "<h2 id='nome'>$nomeUsuario</h2>" ?> <i class="bi bi-person-fill"></i>
        </header>

    <div class="barra">	
        <nav>
            <a href="index.php"><div class="link"><i class="bi bi-diagram-3-fill"></i> Sprint</div></a>
            <a href="dashboard.php"><div class="link"><i class="bi bi-graph-down"></i>  Gráfico de Bundown </div></a>

            
         
        </nav>	
        <a href="logout.php" class="sair"><i class="bi bi-house"></i><p>sair</p></a>
    </div>

    <div id="dashboard">
        <section>
            <div class="cont">
                <table id="sprints">
                    <?php
                    include_once "bd.php";

                    $sql = "SELECT * FROM sprint";
        
                    $resultado = $bd->query($sql);
                    $registros = $resultado->fetchAll();
                    $id = $registros[0]['id'];
                      foreach ($registros as $sprint) {            
                            print ('
                                <tr class="li-sprint">
                                <td><div class="newSprint"><h4>'.$sprint["sprint"].'</h4> <p>'.$sprint["descricao"].'</p> <span>'.$sprint["data"].'</span> <div id="num">'.$sprint["demandaConcluida"].'/'.$sprint["demandaTotal"].'</div> </div></td>
                                <td><i onclick='."atualizar($id)".' class="att bi bi-pencil-fill"></i></td>
                                <td><i id='."$id". ' onclick='.'deletar('.$sprint['id'].')'.'  class="delet bi bi-archive-fill"></i></td>
                                </tr>
                            ');
                        } 
                    
                    ?>  
            </div>
           
           
        </section>


        <button id="addSprint"> <i class="bi bi-plus-lg"></i> Nova Sprint</button>
    </div>
    <script src="js/sweetalert2.js"></script>
    <script src="js/jquery.js"></script>   
    <script src="js/modal.js"></script>
    <script src="js/script.js"></script>
    

</body>

</html>