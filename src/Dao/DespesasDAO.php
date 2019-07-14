<?php

	class DespesasDAO {
	    private $conexao = null;

	    public function __construct() {
	        $this->conexao = conexao::getInstance();
	    }

		public function inserirDespesa($despesa){
			try{
		        $status = $this->conexao->prepare("Insert Into despesa(id, conta_id, categoria_despesa_id, descricao, valor, data, pago) values (null,?,?,?,?,?,?)");

		        $status->bindValue(1, $despesa->conta_id);
		        $status->bindValue(2, $despesa->categoria_despesa_id);
		        $status->bindValue(3, $despesa->descricao);
		        $status->bindValue(4, $despesa->valor);
		        $status->bindValue(5, $despesa->data);
		        $status->bindValue(6, $despesa->pago);
		        $status->execute();

		        //Atualiza saldo da conta debitada
		        $status2 = $this->conexao->prepare("UPDATE conta SET saldo = saldo - ? WHERE id = ?");
				$status2->bindValue(1, $despesa->valor);
		        $status2->bindValue(2, $despesa->conta_id);
		        $status2->execute();

		        //Encerra a conexão com o banco
		        $this->conexao = null;	
		        return true;
		    } catch (PDOException $e) {
		    	return false;
		    }
		}

		public function EditarDespesa($despesa){
			try{
		        $status = $this->conexao->prepare("UPDATE despesa SET conta_id = ?, categoria_despesa_id = ?, descricao = ?, valor = ?, data = ?, pago = ? WHERE id = ?;");

		        $status->bindValue(1, $despesa->conta_id);
		        $status->bindValue(2, $despesa->categoria_despesa_id);
		        $status->bindValue(3, $despesa->descricao);
		        $status->bindValue(4, $despesa->valor);
		        $status->bindValue(5, $despesa->data);
		        $status->bindValue(6, $despesa->pago);
		        $status->bindValue(7, $despesa->id);
		        
		        $status->execute();

		        //Encerra a conexão com o banco
		        $this->conexao = null;
		        return true;
		    } catch (PDOException $e) {
		    	return false;
		    }
		}

		public function buscarDespesa($despesa_id){
			try{
				$status = $this->conexao->prepare("SELECT * FROM despesa WHERE id = ?");
				$status->bindValue(1, $despesa_id);
				$status->execute();

	            $resultado = $status->fetchAll();

	            $this->conexao = null;

	            return $resultado[0];
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao buscar a despesa' . $e;
	        }
		}

		// Busca todas as despesas referente ao usuario
		public function buscarDespesasUsuario($usuario_id){
			try{
	            $status = $this->conexao->prepare("SELECT d.*, cd.nome as categoria, c.tipo as conta FROM despesa d INNER JOIN conta c ON d.conta_id = c.id INNER JOIN categoria cd ON cd.id = d.categoria_despesa_id WHERE c.usuario_id = ? ORDER BY d.data DESC");
	            $status->bindValue(1, $usuario_id);
				$status->execute();

	            $array = array();
	            $array = $status->fetchAll(PDO::FETCH_CLASS, 'DespesasModel');

	            $this->connection = null;
	            // echo $array[0]->conta_id;
	            return $array;
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao buscar as despesas' . $e;
	        }
	    }

	    public function buscarDespesasUsuarioFiltradas($usuario_id, $mes, $ano){
			try{
	            $status = $this->conexao->prepare("SELECT d.*, cd.nome as categoria, c.tipo as conta FROM despesa d INNER JOIN conta c ON d.conta_id = c.id INNER JOIN categoria cd ON cd.id = d.categoria_despesa_id WHERE c.usuario_id = ? AND MONTH(d.data) = ? AND YEAR(d.data) = ? ORDER BY d.data DESC");
	            $status->bindValue(1, $usuario_id);
	            $status->bindValue(2, $mes);
	            $status->bindValue(3, $ano);
				$status->execute();

	            $array = array();
	            $array = $status->fetchAll(PDO::FETCH_CLASS, 'DespesasModel');

	            $this->connection = null;
	           
	            return $array;
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao filtrar as despesas' . $e;
	        }
	    }

	 //    // Busca todas as despesas referentes a conta
		// public function buscarDespesasConta($conta_id){
		// 	try{
	 //            $status = $this->conexao->prepare("SELECT * FROM despesa WHERE conta_id = ?");
	 //            $status->bindValue(1, $conta_id);
		// 		$status->execute();

	 //            $array = array();
	 //            $array = $status->fetchAll(PDO::FETCH_CLASS, 'DespesasModel');

	 //            $this->connection = null;

	 //            return $array;
	 //        } catch (PDOException $e){
	 //            echo 'Ocorreram erros ao buscar as despesas' . $e;
	 //        }
	 //    }

	    public function excluirDespesa($despesa_id){
	    	try{
				$status = $this->conexao->prepare("DELETE FROM despesa WHERE id = ?");
				$status->bindValue(1, $despesa_id);
				$status->execute();

	            if($status){
					return true;
				}else{
					return false;
				}
	        
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao excluir a despesa' . $e;
	        }
	    }

	    public function totalDespesas($usuario_id){
	    	try{
				$status = $this->conexao->prepare("SELECT sum(d.valor) AS total FROM despesa d INNER JOIN conta c ON d.conta_id = c.id INNER JOIN usuario u ON c.usuario_id = u.id WHERE u.id = ? AND MONTH(d.data) = MONTH(CURDATE()) AND YEAR(d.data) = YEAR(CURDATE())");
				$status->bindValue(1, $usuario_id);
				$status->execute();
			
	            if($status){
					return $status->fetchAll()[0]['total'];
				}else{
					return false;
				}
	        
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao excluir a despesa' . $e;
	        }
	    }

	   //  public function totalDespesasNaoPagas($usuario_id){
	   //  	try{
				// $status = $this->conexao->prepare("SELECT sum(d.valor) AS total FROM despesa d INNER JOIN conta c ON d.conta_id = c.id INNER JOIN usuario u ON c.usuario_id = u.id WHERE u.id = ? AND d.pago = 'Nao'");
				// $status->bindValue(1, $usuario_id);
				// $status->execute();
			
	   //          if($status){
				// 	return $status->fetchAll()[0]['total'];
				// }else{
				// 	return false;
				// }
	        
	   //      } catch (PDOException $e){
	   //          echo 'Ocorreram erros ao excluir a despesa' . $e;
	   //      }
	   //  }
	}
?>