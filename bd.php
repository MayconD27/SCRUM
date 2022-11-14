<?php

/* Credenciais do banco de dados. Supondo que você esteja executando o MySQL
servidor com configuração padrão (usuário 'root' sem senha) */


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'scrum');

/*
define('DB_SERVER', 'sprints-grafico.mysql.uhserver.com');
define('DB_USERNAME', 'sprints_grafico');
define('DB_PASSWORD', 'FtAC@ffTb8Pq8i.');
define('DB_NAME', 'sprints_grafico');
*/

try{
    $bd = new PDO("mysql:host=" . DB_SERVER . ";dbname=" 
    . DB_NAME, DB_USERNAME, DB_PASSWORD, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8', SESSION SQL_BIG_SELECTS=1", 
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
            PDO::ATTR_PERSISTENT => true
        )
    );
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Não foi possível conectar." . $e->getMessage());
}