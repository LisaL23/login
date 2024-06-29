<?php

require_once("base_dados_helper.php");
require_once("funcoes.php");

$form = isset($_POST["login_digitado"]) && isset($_POST["senha_digitada"]);

if($form){
    $login_digitado = $_POST["login_digitado"];
    $senha_digitada = $_POST["senha_digitada"];
    $resultado = verificarLogin($login_digitado, $senha_digitada);
    if($resultado){
        header("Location: produtos.php");
    }
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio Session</title>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- link css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="login-container">
        
        
        <form method="post" class="login-form">
            <h2>Login</h2>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="login_digitado" placeholder="login" required autofocus>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="senha_digitada" placeholder="senha" required>
            </div>

            <?php if($form): ?>
                <span>Login inválido!</span>
            <?php endif; ?>

            <button type="submit">Login</button>
            <p class="signup-link">Não tem conta? <a href="registar.php">Registar</a></p>
        </form>


    </div>

</body>
</html>