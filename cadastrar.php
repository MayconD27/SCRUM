<?php
    include_once "bd.php";
    $nome =isset ($_POST['nome']) ?  $_POST['nome'] : '';
    $email = isset($_POST['email']) ?  $_POST['email'] : '';
    $senha = isset($_POST['senha']) ?  $_POST['senha'] : '';

    
    $sql = "INSERT INTO usuario VALUE (NULL, '$nome', '$email', '$senha')";
    $resultado = $bd->query($sql);
    header('location: cadastro.php');
    exit;
