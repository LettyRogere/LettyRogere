<?php
//Configuração da conexão com o BD
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$dbHost = "";
$dbUserName "";
$dbPassword = "";
$dbName = "u179408266_acstem_escolas";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conexao = new mysqli($dbHost, $dbUserName, $dbPassword, $dbName);

if($conexao->connect_errno){
    //echo "erro";
}else{
    //echo "Conectado";
}

?>