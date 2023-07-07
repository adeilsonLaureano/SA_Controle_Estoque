<?php
    session_start();
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>- Editar</title>
</head>

<body>

    <h1>Editar</h1>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    //Incluir os arquivos
    require_once(__DIR__.'/../Conn.php');
    require_once("Produtos.php");

    //Receber os dados do formulario
    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    //Verificar se o usuario clicou no botao
    if (!empty($formData['SendEditProdutos'])) {
        //var_dump($formData);
        $editProdutos = new Produtos();
        $editProdutos->formData = $formData;
        $value = $editProdutos->edit();
        if($value){
            echo  "<script>alert('Dados editados com sucesso'); window.location.href='View.php';</script>";
        }else{
            echo "<script>alert('Algo deu errado, tente novamente'); window.location.href='View.php';</script>";
        }
    }

    //Verificar se o id possui valor
    if (!empty($id)) {

        //Instanciar a classe e criar o objeto
        $viewProdutos = new Produtos();

        //Enviando o id para o atributo id da classe Produtos
        $viewProdutos->id = $id;

        $valueProdutos = $viewProdutos->view();

        extract($valueProdutos);

    ?>
        <form name="EditProdutos" method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />

            <input type="file" name="imagem" value="<?php echo $imagem; ?>" /> <br><br>

            <label>Nome: </label>
            <input type="text"  name="nome" placeholder="Digite o novo Nome" value="<?php echo $nome; ?>" required /><br><br>

            <label>Marca: </label>
            <input type="text"  name="marca" placeholder="Atualize a marca" value="<?php echo $marca; ?>" required /><br><br>

            
            <label>Modelo: </label>
            <input type="text"  name="modelo" placeholder="Atualize o modelo" value="<?php echo $modelo; ?>" required /><br><br>

            
            <label>Descrição: </label>
            <input type="text"  name="descricao" placeholder="Atualize a descricao" value="<?php echo $descricao; ?>" required /><br><br>

            
            <label>Voltagem: </label>
            <input type="number"  name="voltagem" placeholder="Atualize a voltagem" value="<?php echo $voltagem; ?>" required /><br><br>

            
            <label>Quantidade: </label>
            <input type="text"  name="quantidade" placeholder="Atualize a quantidade" value="<?php echo $quantidade; ?>" required /><br><br>

            
            <label>Preço: </label>
            <input type="number"  name="preco" placeholder="Atualize o preco" value="<?php echo $preco; ?>" required /><br><br>

            <input type="submit" value="Editar" name="SendEditProdutos" />
        </form>
    <?php


    } else {
        $_SESSION['msg'] = "<script>alert('Algo deu errado, tente novamente'); window.location.href='View.php';</script>";
        
    }
    ?>

</body>

</html>