<?php 

require_once("base_dados_helper.php");
require_once("funcoes.php");

//verigicar se esta com login
estaLogado();
$cliente_logado = $_SESSION["cliente_logado"];

if(!$cliente_logado["admin"]){
    header("Location: index.php");
}

$colaboradores = selectSQL("SELECT * FROM colaboradores");




?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colaboradores</title>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- link css -->
    <link rel="stylesheet" href="style_pag.css">
</head>
<body>

    <div class="nav">
        <a href="produtos.php" class="esp">Produtos</a>
        <a href="colaboradores.php" class="esp">Colaboradores</a>
        <a href="logout.php">Logout</a>
    </div>

    <h2>Colaboradores</h2>

    <table>
         
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>APELIDO</th>
            <th>NIF</th>
            <th>MORADA</th>
        </tr>
        
        <?php foreach($colaboradores as $c): ?>
        
            <tr>
                <td><?= $c["id"]; ?></td>
                <td><?= $c["nome"]; ?></td>
                <td><?= $c["apelido"]; ?></td>
                <td><?= $c["nif"]; ?></td>
                <td><?= $c["morada"]; ?></td>
                
            </tr>
            
        <?php endforeach; ?>

    </table>

</body>
</html>