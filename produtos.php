<?php 

require_once("base_dados_helper.php");
require_once("funcoes.php");

//verigicar se esta com login
estaLogado();
$cliente_logado = $_SESSION["cliente_logado"];

$produtos = selectSQL("SELECT * FROM produtos");


?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="style_pag.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <div class="nav">
        <a href="produtos.php" class="esp">Produtos</a>
        <a href="colaboradores.php" class="esp">Colaboradores</a>
        <a href="logout.php">Logout</a>
    </div>

    <h2>Olá <?= $cliente_logado["nome"]; ?> <?= $cliente_logado["apelido"]; ?>!</h2>
    
    <table>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>PREÇO</th>
            <th>QUANTIDADE</th>
            <th>EDITAR</th>
            <th>APAGAR</th>
        </tr>
        
        <?php foreach($produtos as $p): ?>
            <tr>
                <td><?= $p["id"]; ?></td>
                <td><?= $p["nome"]; ?></td>
                <td><?= number_format($p["preco"], 2); ?> €</td>
                <td><?= $p["quantidade"]; ?> uni</td>
                <td>
                    <form action="editar.php">
                        <button name="id" value="<?= $p["id"]; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                    </form>
                </td>
                <td>
                    <form action="apagar.php">
                        <button name="id" value="<?= $p["id"]; ?>"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>