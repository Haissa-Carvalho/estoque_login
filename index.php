<?php
session_start();
require_once 'produtos.modelo.php';

$produtos = buscarProdutos();
$qtdeProdutos = count($produtos);

require_once 'usuarios.modelo.php';
if (empty($_SESSION['usuario']))
{
    // o usuario nao esta logado
    // redirecionaod para a pagina de login
    header("Location: login.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de estoque</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="container">
    <h1>Petz</h1>
    <h1>Bem-vindo, 
        <?= $_SESSION['usuario'] ?>
    </h1>
    <a href="logout.php">Sair do sistema</a>
    <h2>Controle de Estoque</h2>
    <h3>Produtos cadastrados</h3>

    <p>Atualmente temos <?= $qtdeProdutos ?> produtos cadastrados.</p>

    <div class="btn-group mb-3">
        <button class="btn btn-secondary">Cadastrar novo produto</button>
        <button class="btn btn-secondary">Registrar Entrada no estoque</button>
        <button class="btn btn-secondary">Filtrar por produtos com baixo estoque</button>
    </div>

    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Preço Unitário</th>
                <th>Qtd. em estoque</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $prod): ?>
            
            <tr>
                <td><?= $prod['id'] ?></td>
                <td><?= $prod['descricao'] ?></td>
                <td><?= $prod['preco'] ?></td>
                <td><?= $prod['qtde'] ?></td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>