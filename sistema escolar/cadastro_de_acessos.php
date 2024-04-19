<?php
include_once('php/funcoes.php');
    
iniciarSessao();

date_default_timezone_set('America/Sao_Paulo');
if (isset($_POST['submit'])) {

    include_once('php/config.php');
    $cpf = preg_replace('/[^0-9]/', '', $_POST['cpf']);
    $password = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $dataAtual = date("Y-m-d H:i:s");

    $sql = "INSERT INTO acessos (cpf, senha, ultAcesso) VALUES  (?, ?, '$dataAtual')";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $cpf, $password);
    $stmt->execute();

    if(isset($_POST['typeAccess'])){
        $listaCheckbox = $_POST['typeAccess'];
        $arr = '';
        foreach ($listaCheckbox as $typeAccess) {
            
           $arr .= $typeAccess.',';

        }

        $arr = rtrim($arr, ',');
        $sql = "UPDATE acessos SET tipoAcesso = ? WHERE cpf = '$cpf'";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("s", $arr);
        $stmt->execute();
        
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/formularios.css">
    <script defer src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script defer src="js/funcoes.js"></script>
    <script src="js/style.js"></script>
    <title>ACESSOS | ESCOLA CONECTADA</title>
</head>

<body>
    <div class="box">

        <form class="f-cads" action="cadastro_de_acessos.php" method="POST">
            <fieldset>
                <legend>Cadastro de Acessos</legend>

                <div class="inputBox">

                    <input type="text" name="cpf" id="cpf" class="in-access" required>
                    <label for="cpf" class="lb-access">CPF</label>
                </div>

                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="in-access" required>
                    <label for="senha" class="lb-access">Senha</label>
                    <i class="bi bi-eye-fill" id="btn-senha" onclick="sPwrd()"></i>
                    
                </div>

                <p>Tipo de Acesso:</p>
                <div class="inputBox">
                    <input type="checkbox" name="typeAccess[]" id="aProfessor" value="2">Professor
                    <input type="checkbox" name="typeAccess[]" id="aAluno" value="3">Aluno
                    <input type="checkbox" name="typeAccess[]" id="aAdm" value="1">Administrador
                </div>

                <div class="inputBox">
                    <input type="checkbox" name="inativo[]" id="inativo" value="1">Inativo
                </div>

                <button type="submit" name="submit" id="submit">INCLUIR</button>
            </fieldset>
        </form>

    </div>
</body>

</html>