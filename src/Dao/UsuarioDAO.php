<?php

	include '../Persistence/Conexao.php';

	// $conexao = getConexao();

	class UsuarioDAO {
	    private $conexao = null;

	    public function __construct() {
	        $this->conexao = conexao::getInstance();
	    }

		function validaLogin($login, $senha){
		
	        $status = $this->conexao->prepare("SELECT * FROM usuario WHERE nome = ? && senha = ?");

	        $status->bindValue(1, $login);
	        $status->bindValue(2, $senha);
	       
	        $status->execute();

	        //Encerra a conexão com o banco
	        $this->conexao = null;

	        $resultado = $status->fetch();

	        return $resultado;
		   


			// $sql = "SELECT * FROM usuarios WHERE login = :login && senha = :senha";
			
			// global $conexao;
			// $stmt = $conexao->prepare($sql);

			// $stmt->bindValue(':login', $login);
			// $stmt->bindValue(':senha', $senha);
			// $stmt->execute();

			// $resultado = $stmt->fetchAll();
			
			// return $resultado;
		}

		function inserirUsuario($usuario){
			try{
		        $status = $this->conexao->prepare("Insert Into usuario(id, nome, cpf, email, senha, saldo_total) values (null,?,?,?,?,?)");

		        $status->bindValue(1, $usuario->nome);
		        $status->bindValue(2, $usuario->cpf);
		        $status->bindValue(3, $usuario->email);
		        $status->bindValue(4, $usuario->senha);
		        $status->bindValue(5, $usuario->saldo_total);

		        $status->execute();

		        //Encerra a conexão com o banco
		        $this->conexao = null;
		        return true;
		    } catch (PDOException $e) {
		    	return false;
		    	// echo "Ocorreram erros ao inserir novo usuario !";
		    }
		}
	}
?>