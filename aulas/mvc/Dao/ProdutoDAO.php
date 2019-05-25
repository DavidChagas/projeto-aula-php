<?php
include '../Persistence/ConnectionDB.php';

class ProdutoDAO {
    private $connection = null;

    public function __construct() {
        $this->connection = ConnectionDB::getInstance();
    }

    public function insertProduto($produto)  {
        try{
            $status = $this->connection->prepare("Insert Into produto(id, descricao, codigoDeReferencia, marca) values (null,?,?,?)");

            $status->bindValue(1, $produto->descricao);
            $status->bindValue(2, $produto->codigoDeReferencia);
            $status->bindValue(3, $produto->marca);

            $status->execute();

            //Encerra a conexão com o banco
            $this->connection = null;

        } catch (PDOException $e) {
            echo "Ocorreram erros ao inserir novo produto !";
        }
    }
}
?>