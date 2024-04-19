<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script defer src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script defer src="js/funcoes.js"></script>
    <script defer src="js/style.js"></script>
    <title>LOGIN | ESCOLA CONECTADA</title>
</head>

<body class="corpo-login">

    <form action="php/validaLogin.php" method="POST">
        <div class="main-login">
            <div class="center-login">
                <div class="card-login">
                    <div class="card-icone">
                        <img src="imagens/logo_escola.png" alt="">
                    </div>
                    <div class="textfield">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" name="cpf" placeholder="CPF">
                    </div>

                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha" id="senha">
                        <i class="bi bi-eye-fill" id="btn-senha" onclick="sPwrd()"></i>
                    </div>
                    <!--<input class="btn-login" type="submit" name="submit" value="Login">-->
                    <button class="btn-login" type="submit" name="submit" value="Login">LOGIN</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>