<?php

$clientes = selectSQL("SELECT * FROM clientes");

function verificarLogin($login_digitado, $senha_digitada){
    global $clientes;
    foreach($clientes as $c){
        if($c["login"] == $login_digitado && password_verify($senha_digitada, $c["senha"])){
            session_start();
            $_SESSION["cliente_logado"] = $c;
            return true;
        }
    }
    return false;

}

function estaLogado(){
    session_start();
    $sessao = isset($_SESSION["cliente_logado"]);
    if(!$sessao){
        header("Location: index.php");
    }
}


?>