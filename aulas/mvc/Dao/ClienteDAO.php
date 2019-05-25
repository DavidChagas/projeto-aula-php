<?php
include '../Persistence/ConnectionDB.php';

class clienteDAO {
    private $connection = null;

    public function __construct() {
        $this->connection = ConnectionDB::getInstance();
    }

    public function insertCliente($cliente)  {
        try{
            $status = $this->connection->prepare("Insert Into cliente(id, nome, dataNascimento, cpf, sexo, profissao, telefone, celular, email, cep, endereco, numero, complemento, bairro, cidade, estado, observacao) values (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

            $status->bindValue(1, $cliente->nome);
            $status->bindValue(2, $cliente->dataNascimento);
            $status->bindValue(3, $cliente->cpf);
            $status->bindValue(4, $cliente->sexo);
            $status->bindValue(5, $cliente->profissao);
            $status->bindValue(6, $cliente->telefone);
            $status->bindValue(7, $cliente->celular);
            $status->bindValue(8, $cliente->email);
            $status->bindValue(9, $cliente->cep);
            $status->bindValue(10, $cliente->endereco);
            $status->bindValue(11, $cliente->numero);
            $status->bindValue(12, $cliente->complemento);
            $status->bindValue(13, $cliente->bairro);
            $status->bindValue(14, $cliente->cidade);
            $status->bindValue(15, $cliente->estado);
            $status->bindValue(16, $cliente->observacao);

            $status->execute();

            //Encerra a conexão com o banco
            $this->connection = null;

        } catch (PDOException $e) {
            echo "Ocorreram erros ao inserir novo cliente !";
        }
    }
}
?>