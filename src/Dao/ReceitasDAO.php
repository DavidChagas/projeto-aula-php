<?php

	class ReceitasDAO {
	    private $conexao = null;

	    public function __construct() {
	        $this->conexao = conexao::getInstance();
	    }

		public function inserirReceita($receita){
			try{
		        $status = $this->conexao->prepare("Insert Into receita(id, conta_id, categoria_receita_id, descricao, valor, data, recebido) values (null,?,?,?,?,?,?)");

		        $status->bindValue(1, $receita->conta_id);
		        $status->bindValue(2, $receita->categoria_receita_id);
		        $status->bindValue(3, $receita->descricao);
		        $status->bindValue(4, $receita->valor);
		        $status->bindValue(5, $receita->data);
		        $status->bindValue(6, $receita->recebido);
		        
		        $status->execute();

		        //Atualiza saldo da conta creditada
		        $status2 = $this->conexao->prepare("UPDATE conta SET saldo = saldo + ? WHERE id = ?");
				$status2->bindValue(1, $receita->valor);
		        $status2->bindValue(2, $receita->conta_id);
		        $status2->execute();

		        //Encerra a conexão com o banco
		        $this->conexao = null;
		        return true;
		    } catch (PDOException $e) {
		    	return false;
		    }
		}

		public function EditarReceita($receita){
			try{
		        $status = $this->conexao->prepare("UPDATE receita SET conta_id = ?, categoria_receita_id = ?, descricao = ?, valor = ?, data = ?, recebido = ? WHERE id = ?;");

		        $status->bindValue(1, $receita->conta_id);
		        $status->bindValue(2, $receita->categoria_receita_id);
		        $status->bindValue(3, $receita->descricao);
		        $status->bindValue(4, $receita->valor);
		        $status->bindValue(5, $receita->data);
		        $status->bindValue(6, $receita->recebido);
		        $status->bindValue(7, $receita->id);
		        
		        $status->execute();
		       
		        //Encerra a conexão com o banco
		        $this->conexao = null;
		        return true;
		    } catch (PDOException $e) {
		    	return false;
		    }
		}

		public function buscarReceita($receita_id){
			try{
				$status = $this->conexao->prepare("SELECT * FROM receita WHERE id = ?");
				$status->bindValue(1, $receita_id);
				$status->execute();

	            $resultado = $status->fetchAll();

	            $this->conexao = null;

	            return $resultado[0];
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao buscar a receita' . $e;
	        }
		}

		// Busca todas as receitas referente ao usuario
		public function buscarReceitasUsuario($usuario_id){
			try{
	            $status = $this->conexao->prepare("SELECT r.*, cd.nome as categoria, c.tipo as conta FROM receita r INNER JOIN conta c ON r.conta_id = c.id INNER JOIN categoria cd ON cd.id = r.categoria_receita_id WHERE c.usuario_id = ? ORDER BY r.data DESC");
	            $status->bindValue(1, $usuario_id);
				$status->execute();

	            $array = array();
	            $array = $status->fetchAll(PDO::FETCH_CLASS, 'ReceitasModel');

	            $this->connection = null;
	            // echo $array[0]->conta_id;
	            return $array;
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao buscar as receitas' . $e;
	        }
	    }

	    public function buscarReceitasUsuarioFiltradas($usuario_id, $mes, $ano){
			try{
	            $status = $this->conexao->prepare("SELECT r.*, cd.nome as categoria, c.tipo as conta FROM receita r INNER JOIN conta c ON r.conta_id = c.id INNER JOIN categoria cd ON cd.id = r.categoria_receita_id WHERE c.usuario_id = ? AND MONTH(r.data) = ? AND YEAR(r.data) = ? ORDER BY r.data DESC");
	            $status->bindValue(1, $usuario_id);
	            $status->bindValue(2, $mes);
	            $status->bindValue(3, $ano);
				$status->execute();

	            $array = array();
	            $array = $status->fetchAll(PDO::FETCH_CLASS, 'ReceitasModel');

	            $this->connection = null;
	            
	            return $array;
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao filtrar as receitas' . $e;
	        }
	    }

	 //    // Busca todas as receitas referentes a conta
		// public function buscarReceitasConta($conta_id){
		// 	try{
	 //            $status = $this->conexao->prepare("SELECT * FROM receita WHERE conta_id = ?");
	 //            $status->bindValue(1, $conta_id);
		// 		$status->execute();

	 //            $array = array();
	 //            $array = $status->fetchAll(PDO::FETCH_CLASS, 'ReceitasModel');

	 //            $this->connection = null;

	 //            return $array;
	 //        } catch (PDOException $e){
	 //            echo 'Ocorreram erros ao buscar as receitas' . $e;
	 //        }
	 //    }

	    public function excluirReceita($receita_id){
	    	try{
				$status = $this->conexao->prepare("DELETE FROM receita WHERE id = ?");
				$status->bindValue(1, $receita_id);
				$status->execute();
			
	            if($status){
					return true;
				}else{
					return false;
				}
	        
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao excluir a receita' . $e;
	        }
	    }

	    public function totalReceitas($usuario_id){
	    	try{
				$status = $this->conexao->prepare("SELECT sum(r.valor) AS total FROM receita r INNER JOIN conta c ON r.conta_id = c.id INNER JOIN usuario u ON c.usuario_id = u.id WHERE u.id = ? AND MONTH(r.data) = MONTH(CURDATE()) AND YEAR(r.data) = YEAR(CURDATE())");
				$status->bindValue(1, $usuario_id);
				$status->execute();
			
	            if($status){
					return $status->fetchAll()[0]['total'];
				}else{
					return false;
				}
	        
	        } catch (PDOException $e){
	            echo 'Ocorreram erros' . $e;
	        }
	    }
	}
?>