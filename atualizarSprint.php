<?php

include_once "bd.php";
    $id =isset ($_POST['id_sprint']) ?  $_POST['id_sprint'] : '';
    $nome =isset ($_POST['nome']) ?  $_POST['nome'] : '';
    $desc = isset($_POST['desc']) ?  $_POST['desc'] : '';
    $nDemandC = isset($_POST['nDemandC']) ?  $_POST['nDemandC'] : '';
    $nDemand = isset($_POST['nDemand']) ?  $_POST['nDemand'] : '';
    $data = isset($_POST['data']) ?  $_POST['data'] : '';
   

        $id = $_POST['id_sprint']; 
        $id = openssl_decrypt(
            $id, "AES-256-CBC", "OKGoogle",
        );
        $sql = "UPDATE sprint SET sprint = '$nome', descricao = :desc, demandaConcluida = $nDemandC, demandaTotal = $nDemand, dataSprint = '$data' WHERE id = $id";

        $resultado = $bd->prepare($sql);
        $resultado->bindParam(':desc', $desc);
        $registro = $resultado->execute();
        header('location: index.php');
        exit;

?>