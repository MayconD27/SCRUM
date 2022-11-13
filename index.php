<?php
    error_reporting(E_ERROR);

    session_start();
    $usuarioLogado = isset($_SESSION['logado']) ?  $_SESSION['logado'] : false;

    if($usuarioLogado== false){
        header('location: login.php');
        exit;
    }

    $nomeUsuario = isset($_SESSION['nome']) ?  $_SESSION['nome'] : 'Sem nome';
    $id = $_SESSION['id'];
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

                    $sql = "SELECT * FROM sprint WHERE usuario = $id";
                    
        
                    $resultado = $bd->query($sql);
                    $registros = $resultado->fetchAll();
                    foreach ($registros as $sprint) { 
                        $nome =$sprint['sprint'];
                        $descricao =$sprint['descricao'];
                        $descricao = "$descricao";
                        $demandaC=$sprint['demandaConcluida'];
                        $demandaT = $sprint['demandaTotal'];
                        $dataSprint = $sprint["dataSprint"];

                        $desc = preg_replace('<\W+>', "~~", $descricao);
                        $nomesprint = preg_replace('<\W+>', "~~", $nome);
                        

                        $id_sprint =openssl_encrypt(
                            $sprint['id'], "AES-256-CBC", "OKGoogle",
                        ); 
                               echo "1 $descricao";   
                      
                           echo "<tr class='li-sprint'>"; 
                            echo "<td><div class='newSprint'><h4>".$sprint["sprint"]."</h4> <p>".$sprint["descricao"]."</p> <span>".date("d/m/Y", strtotime($sprint["dataSprint"]))."</span> <div id='num'>".$sprint["demandaConcluida"]."/".$sprint["demandaTotal"]."</div> </div></td>";

                           echo  "<td><i onclick="."atualizar('$id_sprint','$nome','$desc','$demandaC','$demandaT','$dataSprint')"." class='att bi bi-pencil-fill'></i></td>";
                          
                      
                            echo "<td><i onclick="."deletar('$id_sprint')"." class='delet bi bi-archive-fill'></i></td>";
                            echo "</tr>";  
                    };
                    
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