<?php
session_start();
//Verifica as informações que estão vindo do login
//print_r($_REQUEST);

if (isset($_POST['submit']) && !empty($_POST['cpf']) && !empty($_POST['senha'])) {

    include_once('config.php');
    $cpf = $_POST['cpf'];
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    $password = $_POST['senha'];

    $sql = "SELECT * FROM acessos WHERE cpf = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $result = $stmt->get_result();
    //print_r($result);

    if (mysqli_num_rows($result) < 1) {
        //print_r('Usuário não cadastrado!');
        unset($_SESSION['cpf']);
        unset($_SESSION['senha']);
        header('Location: ../index.php');
    } else {
        $usuario = $result->fetch_assoc();
        if(password_verify($password, $usuario['senha'])){
            //print_r('Bem - Vindo(a)!');
            $_SESSION['cpf'] = $cpf;
            $_SESSION['senha'] = $password;
            header('Location: ../home.php');
        }else{
           // print_r('Senha incorreta!');
            unset($_SESSION['cpf']);
            unset($_SESSION['senha']);
            header('Location: ../index.php');
        }
    }
} else {
    unset($_SESSION['cpf']);
    unset($_SESSION['senha']);
    header('Location: index.php');
}
