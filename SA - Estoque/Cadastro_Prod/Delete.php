<?php
session_start();


//Receber o id do usuario
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>- Apagar</title>
</head>

<body>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    //Incluir os arquivos
    require_once(__DIR__.'/../Conn.php');
    require_once("Produtos.php");

 
    //Verificar se o id possui valor
    if (!empty($id)) {

        //Instanciar a classe e criar o objeto
        $deleteProdutos = new Produtos();

        //Enviando o id para o atributo id da classe Produtos
        $deleteProdutos->id = $id;

        $deleteProdutos = $deleteProdutos->delete();
        echo  "<script>alert('Produto deletado com sucesso'); window.location.href='View.php';</script>";
        
    

    } else {
        echo "<script>alert('Algo deu errado, tente novamente'); window.location.href='View.php';</script>";
        
    }
    ?>

</body>

</html>