<?php
	class CategoriaDespesaDAO {
	    private $conexao = null;

	    public function __construct() {
	        $this->conexao = conexao::getInstance();
	    }

		public function buscarCategorias($usuario_id){
			try{
	            $status = $this->conexao->prepare("SELECT * FROM categoria_despesa WHERE usuario_id = ?");
	            $status->bindValue(1, $usuario_id);
				$status->execute();

	            $array = array();
	            $array = $status->fetchAll(PDO::FETCH_OBJ);

	            $this->connection = null;

	            return $array;
	        } catch (PDOException $e){
	            echo 'Ocorreram erros ao buscar as categorias' . $e;
	        }
	    }
	}
?>