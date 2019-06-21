<?php

session_start();

include '../Persistence/Conexao.php';
include '../Model/DespesasModel.php';
include '../DAO/DespesasDAO.php';

if(isset($_GET['operacao'])){

	switch ($_GET['operacao']){

		// 
		// CADASTRAR
		// 
		case 'cadastrar':
			if( (!empty($_POST['descricao'])) && (!empty($_POST['valor'])) && (!empty($_POST['data'])) && 
				(!empty($_POST['conta_id'])) && (!empty($_POST['categoria_despesa_id'])) && 
				(!empty($_POST['pago'])) ){

				$despesa = new DespesasModel();

                $despesa->conta_id = $_POST['conta_id'];
                $despesa->categoria_despesa_id = $_POST['categoria_despesa_id'];
                $despesa->descricao = $_POST['descricao'];
                $despesa->valor = $_POST['valor'];
                $despesa->data = $_POST['data'];
                $despesa->pago = $_POST['pago'];

                $despesasDao = new DespesasDAO();

                if($despesasDao->inserirDespesa($despesa)){
                	$despesasDao = new DespesasDAO();

					$despesas = array();
					$usuario_id = $_SESSION['usuario_id'];
					$despesas = $despesasDao->buscarDespesasUsuario($usuario_id);
					$_SESSION['despesas'] = serialize($despesas);
					header("location:../View/Despesas/DespesasViewListar.php");
                }else{
                	echo 'Erro ao inserir despesa';
                }
	        }else{
				echo 'Informe todos os campos!';
			}
		break;
		
		// 
		// LISTAR
		// 
		case 'listar':
			$despesasDao = new DespesasDAO();

			$despesas = array();
			$usuario_id = $_SESSION['usuario_id'];
			$despesas = $despesasDao->buscarDespesasUsuario($usuario_id);
			$_SESSION['despesas'] = serialize($despesas);
			header("location:../View/Despesas/DespesasViewListar.php");
		break;

		//
		// EDITAR
		//
		case 'editar':
			if( (!empty($_POST['descricao'])) && (!empty($_POST['valor'])) && (!empty($_POST['data'])) && 
				(!empty($_POST['conta_id'])) && (!empty($_POST['categoria_despesa_id'])) && 
				(!empty($_POST['pago'])) ){

				$despesa = new DespesasModel();

				$despesa->id = $_GET['despesa_id'];
                $despesa->conta_id = $_POST['conta_id'];
                $despesa->categoria_despesa_id = $_POST['categoria_despesa_id'];
                $despesa->descricao = $_POST['descricao'];
                $despesa->valor = $_POST['valor'];
                $despesa->data = $_POST['data'];
                $despesa->pago = $_POST['pago'];
                

                $despesasDao = new DespesasDAO();

                if($despesasDao->EditarDespesa($despesa)){
                	// Busca no banco as informacoes atualizadas para ir para a pág listar
                	$despesasDao = new DespesasDAO();

					$despesas = array();
					$usuario_id = $_SESSION['usuario_id'];
					$despesas = $despesasDao->buscarDespesasUsuario($usuario_id);
					$_SESSION['despesas'] = serialize($despesas);
					header("location:../View/Despesas/DespesasViewListar.php");
                }else{
                	echo 'Erro ao editar';
                }
	        }else{
				echo 'Informe todos os campos!';
			}
		break;

		//
		// EXCLUIR
		//
		case 'excluir':
			$despesasDao = new DespesasDAO();
			$despesa_id = $_GET['id'];

			if($despesasDao->excluirDespesa($despesa_id)){
				$despesas = array();
				$usuario_id = $_SESSION['usuario_id'];
				$despesas = $despesasDao->buscarDespesasUsuario($usuario_id);
				$_SESSION['despesas'] = serialize($despesas);
				header("location:../View/Despesas/DespesasViewListar.php");
			}else{
				echo 'Erro ao excluir';
			}
		break;
	}
}
