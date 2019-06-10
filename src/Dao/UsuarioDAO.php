<?php

	include '../Persistence/Conexao.php';

	// $conexao = getConexao();

	class UsuarioDAO {
	    private $conexao = null;

	    public function __construct() {
	        $this->conexao = conexao::getInstance();
	    }

		public function validaLogin($login, $senha){
		
	        $status = $this->conexao->prepare("SELECT * FROM usuario WHERE nome = ? && senha = ?");

	        $status->bindValue(1, $login);
	        $status->bindValue(2, $senha);
	       
	        $status->execute();

	        //Encerra a conexão com o banco
	        $this->conexao = null;

	        $resultado = $status->fetchAll();

	        return $resultado;
		}

		public function inserirUsuario($usuario){
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

		public function buscaUsuario($usuario_id){
			try{
				$status = $this->conexao->prepare("SELECT * FROM usuario WHERE id = ?");

				$status->bindValue(1, $usuario_id);

				$status->execute();

	            $resultado = $status->fetchAll();

	            $this->conexao = null;

	            return $resultado[0];
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao buscar o usuário' . $e;
	        }
		}
	}
?>