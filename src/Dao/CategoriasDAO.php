<?php
	class CategoriasDAO {
	    private $conexao = null;

	    public function __construct() {
	        $this->conexao = conexao::getInstance();
	    }

	    public function inserirCategoria($categoria){
			try{
		        $status = $this->conexao->prepare("Insert Into categoria(id, usuario_id, tipo, nome) values (null,?,?,?)");

		        $status->bindValue(1, $categoria->usuario_id);
		        $status->bindValue(2, $categoria->tipo);
		        $status->bindValue(3, $categoria->nome);
		      
		        $status->execute();

		        //Encerra a conexão com o banco
		        $this->conexao = null;
		        return true;
		    } catch (PDOException $e) {
		    	return false;
		    }
		}

		public function buscarCategoria($categoria_id){

			try{
				$status = $this->conexao->prepare("SELECT * FROM categoria WHERE id = ?");
				$status->bindValue(1, $categoria_id);
				$status->execute();

	            $resultado = $status->fetchAll();

	            $this->conexao = null;
	           
	            return $resultado[0];
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao buscar a categoria' . $e;
	        }
		}

		public function buscarCategorias($usuario_id, $tipo){
			try{
	            $status = $this->conexao->prepare("SELECT * FROM categoria WHERE usuario_id = ? AND tipo  = ?");
	            $status->bindValue(1, $usuario_id);
	            $status->bindValue(2, $tipo);
				$status->execute();

	            $array = array();
	            $array = $status->fetchAll(PDO::FETCH_OBJ);

	            $this->connection = null;

	            return $array;
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao buscar as categorias' . $e;
	        }
	    }

	    public function EditarCategoria($categoria){
			try{
		        $status = $this->conexao->prepare("UPDATE categoria SET nome = ? WHERE id = ?;");

		        $status->bindValue(1, $categoria->nome);
		        $status->bindValue(2, $categoria->id);
		        
		        $status->execute();
		       
		        //Encerra a conexão com o banco
		        $this->conexao = null;
		        return true;
		    } catch (PDOException $e) {
		    	return false;
		    }
		}

	    public function excluirCategoria($categoria_id){
	    	try{
				$status = $this->conexao->prepare("DELETE FROM categoria WHERE id = ?");
				$status->bindValue(1, $categoria_id);
				$status->execute();
			
	            if($status){
					return true;
				}else{
					return false;
				}
	        
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao excluir a categoria' . $e;
	        }
	    }

	    public function buscarTipoCategoria($categoria_id){
	    	try{
				$status = $this->conexao->prepare("SELECT tipo FROM categoria WHERE id = ?");
				$status->bindValue(1, $categoria_id);
				$status->execute();
			
	            if($status){
					return $status->fetchAll()[0]['tipo'];
				}else{
					return false;
				}
	        
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao excluir a categoria' . $e;
	        }
	    }
	}
?>