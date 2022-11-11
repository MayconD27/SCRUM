<?php
    session_start();
    $id =  $_SESSION['id'];
    include_once "bd.php";
    $nome =isset ($_POST['nome']) ?  $_POST['nome'] : '';
    $desc = isset($_POST['desc']) ?  $_POST['desc'] : '';
    $nDemandC = isset($_POST['nDemandC']) ?  $_POST['nDemandC'] : '';
    $nDemand = isset($_POST['nDemand']) ?  $_POST['nDemand'] : '';
    $data = isset($_POST['data']) ?  $_POST['data'] : '';
   
    if(! $nome || ! $desc ||  ! $nDemandC || ! $nDemand || ! $data){
        header('location: index.php');
        exit;
    }
    else{
        
        $sql = "INSERT INTO sprint VALUE (NULL,$id, :nome, :descri, $nDemandC,$nDemand,:dataSpr)";
        $resultado = $bd->prepare($sql);
        $resultado->bindParam(':nome', $nome);
        $resultado->bindParam(':descri', $desc);
        $resultado->bindParam(':dataSpr', $data);
        $registro = $resultado->execute();
        header('location: index.php');
        exit;
        
    }