<?php
    include_once "bd.php";
    $nome =isset ($_POST['nome']) ?  $_POST['nome'] : '';
    $email = isset($_POST['email']) ?  $_POST['email'] : '';
    $senha = isset($_POST['senha']) ?  $_POST['senha'] : '';

    $senha = openssl_encrypt(
        $senha, "AES-256-CBC","OKGoogle",
    );
    if(! $nome || ! $email ||  ! $senha){
        header('location: cadastro.php');
        exit;
    }
    else{
        
        $sql = "INSERT INTO usuario VALUE (NULL, :nome, :email, :senha)";
        $resultado = $bd->prepare($sql);
        $resultado->bindParam(':nome', $nome);
        $resultado->bindParam(':email', $email);
        $resultado->bindParam(':senha', $senha);
        $registro = $resultado->execute();
        header('location: login.php');
        exit;


    }