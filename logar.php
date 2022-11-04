<?php

    session_start();
    include_once "bd.php";

    $email = ($_POST['email']) ?  $_POST['email'] : '';

    $senha = ($_POST['senha']) ?  $_POST['senha'] : '';

    $senha = openssl_encrypt(
        $senha, "AES-256-CBC", "OKGoogle",
    );


    $sql ="SELECT id, nome FROM usuario WHERE email = :email AND senha = :senha";
    $resultado = $bd->prepare($sql);
    $resultado->bindParam(':email', $email, PDO::PARAM_STR);
    $resultado->bindParam(':senha', $senha, PDO::PARAM_STR);
    $resultado->execute();
    $registros = $resultado->fetchAll(); 

    
    if(count($registros)==1){
        $_SESSION['logado'] = true;
        $_SESSION['nome'] = $registros[0]['nome'];
        $_SESSION['id'] = $registros[0]['id'];
        header('location: index.php');
        exit;
    }else{
        header('location: login.php');
        exit;
    }
?>