<?php

require_once(__DIR__.'/../Conn.php');

class Produtos extends Conn
{
    public object $conn;
    public array $formData;
    public int $id;

    public function connexao(){
        $this->conn = $this->connect();
        return $this->conn;
    }

    public function listProdutos(): array
    {
        $this->conn = $this->connect();
        $query_Produtoss = "SELECT * FROM produtos ORDER BY id ASC LIMIT 40";
        $result_Produtoss = $this->conn->prepare($query_Produtoss);
        $result_Produtoss->execute();
        $retorno = $result_Produtoss->fetchAll();
        //var_dump($retorno);
        return $retorno;
    }

    public function create(): bool
    {
        //var_dump($this->formData);
        $this->conn = $this->connect();
        $query_Produtos = "INSERT INTO produtos (nome, marca, modelo, descricao, voltagem, quantidade, preco) VALUES (:nome, :marca, :modelo, :descricao, :voltagem, :quantidade, :preco)";
        $add_Produtos = $this->conn->prepare($query_Produtos);
        $add_Produtos->bindParam(':nome', $this->formData['nome']);
        $add_Produtos->bindParam(':marca', $this->formData['marca']);
        $add_Produtos->bindParam(':modelo', $this->formData['modelo']);
        $add_Produtos->bindParam(':descricao', $this->formData['descricao']);
        $add_Produtos->bindParam(':voltagem', $this->formData['voltagem']);
        $add_Produtos->bindParam(':quantidade', $this->formData['quantidade']);
        $add_Produtos->bindParam(':preco', $this->formData['preco']);

        $add_Produtos->execute();

        if ($add_Produtos->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function view()
    {
        $this->conn = $this->connect();
        $query_Produtos = "SELECT id, nome, marca, modelo, descricao, voltagem, quantidade, preco
                        FROM produtos
                        WHERE id =:id
                        LIMIT 1";
        $result_Produtos = $this->conn->prepare($query_Produtos);
        $result_Produtos->bindParam(':id', $this->id);
        $result_Produtos->execute();
        $value = $result_Produtos->fetch();
        return $value;
    }

    public function edit() : bool
    {
        //var_dump($this->formData);
        $this->conn = $this->connect();
        $query_Produtos = "UPDATE produtos SET nome=:nome, marca=:marca, modelo=:modelo, descricao=:descricao, voltagem=:voltagem, quantidade=:quantidade, preco=:preco
            WHERE id=:id";
        $edit_Produtos = $this->conn->prepare($query_Produtos);
        $edit_Produtos->bindParam(':nome', $this->formData['nome']);
        $edit_Produtos->bindParam(':marca', $this->formData['marca']);
        $edit_Produtos->bindParam(':modelo', $this->formData['modelo']);
        $edit_Produtos->bindParam(':descricao', $this->formData['descricao']);
        $edit_Produtos->bindParam(':voltagem', $this->formData['voltagem']);
        $edit_Produtos->bindParam(':quantidade', $this->formData['quantidade']);
        $edit_Produtos->bindParam(':preco', $this->formData['preco']);
        $edit_Produtos->bindParam(':id', $this->formData['id']);
        
        $edit_Produtos->execute();

        if($edit_Produtos->rowCount()){
            return true;
        }else{
            return false;
        }

    }
    public function delete():bool{
        $this->conn = $this->connect();
        $query_Produtos = "DELETE from produtos WHERE id=:id";
        $delete_Produtos = $this->conn->prepare($query_Produtos);
        $delete_Produtos->bindParam(':id',$this->id);
        $value = $delete_Produtos->execute();
        return $value;
    }
}