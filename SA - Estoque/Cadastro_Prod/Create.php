<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>

    <link rel="stylesheet" href="../Estilos/formProd.css">

</head>


<body>

    <?php
    require_once(__DIR__.'/../Conn.php');
    require_once("Produtos.php");

        // Recebendo os valores em forma de array
        $formData = filter_input_array(INPUT_POST,FILTER_DEFAULT);
        // Verificando se o botão de cadastro foi acionado
        if(!empty($formData['add_Produtos'])){
            //Criando novo objeto e setando ao atributo formData o array
            $createProdutos = new Produtos();
            $createProdutos->formData = $formData;
            $result = $createProdutos->create();

            if($result){
                echo "<script>alert('Produto cadastrado com sucesso')</script>";
                
            }
            else{
                echo "<script>alert('Algo deu errado, tente novamente')</script>";
            }


        }
    
     

    ?>


    <form name="create_Produtos" method="POST" action="" style="background-color: lightblue;">

        <label>Nome do Produto:</label><br>
        <input type="text" autocomplete="off" name="nome" required><br>    

        <label>Marca do Produto:</label><br>
        <input type="text" autocomplete="off" name="marca" required><br>
        
        <label>Modelo do Produto</label><br>
        <input type="text" autocomplete="off" name="modelo" required><br>

        <label>Descrição do Produto:</label><br>
        <input type="text" autocomplete="off" name="descricao" required><br>

        <label>Voltagem do Produto:</label><br>
        <input type="number" autocomplete="off" name="voltagem" required><br>

        <label>Quantidade em Estoque:</label><br>
        <input type="number" autocomplete="off" name="quantidade" required><br>

        <label>Preço:</label><br>
        <input type="number" autocomplete="off" name="preco" required><br>

        <input type="submit" value="Salvar" autocomplete="off" name="add_Produtos">

    </form>
    

</body>
</html>