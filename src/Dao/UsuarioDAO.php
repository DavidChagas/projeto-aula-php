<?php

	// include '../Persistence/Conexao.php';

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
		        $status = $this->conexao->prepare("Insert Into usuario(id, nome, cpf, email, senha) values (null,?,?,?,?,?)");

		        $status->bindValue(1, $usuario->nome);
		        $status->bindValue(2, $usuario->cpf);
		        $status->bindValue(3, $usuario->email);
		        $status->bindValue(4, $usuario->senha);
		        
		        $status->execute();

		        //Busca id do usuário inserido 
		        $query = $this->conexao->prepare("SELECT id FROM usuario WHERE nome = ? ORDER BY id desc LIMIT 1");
		        $query->bindValue(1, $usuario->nome);
		        $query->execute();

		        $id_usuario = $query->fetchAll();
		        
		        //Encerra a conexão com o banco
		        $this->conexao = null;

		        if(isset($id_usuario[0]['id'])){
					return $id_usuario[0]['id'];
		        }else{
		        	return 0;
		        }
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

		public function EditarUsuario($usuario){
			try{
		        $status = $this->conexao->prepare("UPDATE usuario SET nome = ?, cpf = ?, email = ?, senha = ? WHERE id = ?;");

		        $status->bindValue(1, $usuario->nome);
		        $status->bindValue(2, $usuario->cpf);
		        $status->bindValue(3, $usuario->email);
		        $status->bindValue(4, $usuario->senha);
		        $status->bindValue(5, $usuario->id);
		        
		        $status->execute();
		       
		        //Encerra a conexão com o banco
		        $this->conexao = null;
		        return true;
		    } catch (PDOException $e) {
		    	return false;
		    }
		}

		public function excluirUsuario($usuario_id){
	    	try{
				$status = $this->conexao->prepare("DELETE FROM usuario WHERE id = ?");
				$status->bindValue(1, $usuario_id);
				$status->execute();
			
	            if($status){
					return true;
				}else{
					return false;
				}
	        
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao excluir o usuário' . $e;
	        }
	    }

	    public function buscaSaldoTotal($usuario_id){
	   		try{
				$status = $this->conexao->prepare("SELECT SUM(saldo) FROM conta WHERE usuario_id = ?");
				$status->bindValue(1, $usuario_id);
				$status->execute();
				
				return $status->fetch()[0];
	        
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao excluir o usuário' . $e;
	        }
	    }
	}
?>