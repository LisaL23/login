<?php

//ATENÇÃO! No SQL o varchar para a password tem de ser >= 60 caracteres, que é o normal da função password_hash();

require_once("base_dados_helper.php");
require_once("funcoes.php");

$erro = "";

$form = isset($_POST["nome"]) && isset($_POST["apelido"]) && isset($_POST["morada"]) && isset($_POST["login"]) && isset($_POST["senha"]);
if($form){
    $nome = $_POST["nome"];
    $apelido = $_POST["apelido"];
    $morada = $_POST["morada"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $senha_cript = password_hash($senha, PASSWORD_DEFAULT);

    $existe_cliente = selectSQLUnico("SELECT login FROM clientes WHERE login='$login'");


    if(empty($existe_cliente)){
        iduSQL("INSERT INTO clientes (nome, apelido, morada, login, senha) VALUES ('$nome', '$apelido', '$morada', '$login', '$senha_cript')");
        header("Location: index.php");
    }
    else{
        $erro = "Login já existe, tente outro!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar novo usuário</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="login-container">

        <form method="post" class="login-form">

            <h2>Registar</h2>

            <div class="input-group">
                <label for="username">Nome</label>
                <input type="text" name="nome" required autofocus>
            </div>
            <div class="input-group">
                <label for="username">Apelido</label>
                <input type="text" name="apelido" required>
            </div>
            <div class="input-group">
                <label for="username">Morada</label>
                <input type="text" name="morada" required>
            </div>
            <div class="input-group">
                <label for="username">Login</label>
                <input type="text" name="login" required>
            </div>
            <div class="input-group">
                <label for="username">Senha</label>
                <input type="password" name="senha" required>
            </div>

            <?php if ($erro): ?>
                <div class="error-message">
                    <?= $erro; ?>
                </div>
            <?php endif; ?>

            <button type="submit">Registar</button>

        </form>

    </div>
       
    
</body>
</html>