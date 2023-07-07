<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Vendas</title>

        <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>                    
</head>

<body>
    
    <h1>Vender</h1>

    <?php

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    require_once(__DIR__.'/../Conn.php');
    require_once("Produtos.php");

    $listProdutos = new Produtos();
    $result_Produtos = $listProdutos->listProdutos();

    $cont = 0;

    foreach ($result_Produtos as $row_Produtos) {
        $cont++;
        extract($row_Produtos);

        echo "<div class='card m-3 bg-info' style='width: 18rem; display: inline-block'>
                    <div class='card-body'>
                        <h5 class='card-title'>$nome</h5>
                        <p class='card-text'>$marca $modelo </p>
                        <p class='card-text'>Descrição: $descricao </p>
                        <p class='card-text'>Voltagem: $voltagem </p>
                        <p class='card-text'>Quantidade: $quantidade </p>
                        <p class='card-text'>Preço: $preco </p>
                        <a href='Edit.php?id=$id' class='btn btn-primary'>Editar</a>
                        <a href='Delete.php?id=$id' class='btn btn-danger'>Deletar</a>

                    </div>
              </div>";

    } 

    ?>

</body>

</html>