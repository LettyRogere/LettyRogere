<?php
function iniciarSessao(){
    session_start();
    if((!isset($_SESSION['cpf']) == true) && (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['cpf']);
        unset($_SESSION['senha']);
        header('Location: index.php');
    }

}
?>