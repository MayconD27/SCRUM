<?php
include_once "bd.php";
session_start();
$id =  $_SESSION['id'];

$sql = "SELECT sprint,demandaTotal, demandaConcluida FROM sprint WHERE usuario = $id";
                    
        
$resultado = $bd->query($sql);
$registros = $resultado->fetchAll();





echo json_encode($registros);
?>