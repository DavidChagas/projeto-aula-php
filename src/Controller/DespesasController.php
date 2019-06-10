<?php

session_start();

include '../Model/DespesasModel.php';
include '../DAO/DespesasDAO.php';

if(isset($_GET['operacao'])){

	switch ($_GET['operacao']){

		// 
		// CADASTRAR
		// 
		case 'cadastrar':
			if( (!empty($_POST['tipo'])) && (!empty($_POST['saldo'])) && (!empty($_POST['limite_despesas']))){
				$conta = new ContasModel();

                $conta->usuario_id = $_SESSION['usuario_id'];
                $conta->tipo = $_POST['tipo'];
                $conta->saldo = $_POST['saldo'];
                $conta->limite_despesas = $_POST['limite_despesas'];

                $contasDao = new ContasDAO();

                if($contasDao->inserirConta($conta)){
                	$contasDao = new ContasDAO();

					$contas = array();
					$usuario_id = $_SESSION['usuario_id'];
					$contas = $contasDao->buscarContas($usuario_id);
					$_SESSION['contas'] = serialize($contas);
					header("location:../View/Contas/ContasViewListar.php");
                }else{
                	echo 'Erro ao inserir conta';
                }
	        }else{
				echo 'Informe todos os campos!';
			}
		break;
		
		// 
		// CONSULTAR
		// 
		case 'listar':
			$despesasDao = new DespesasDAO();

			$despesas = array();
			$usuario_id = $_SESSION['usuario_id'];
			$despesas = $despesasDao->buscarDespesasUsuario($usuario_id);
			$_SESSION['despesas'] = serialize($despesas);
			header("location:../View/Despesas/DespesasViewListar.php");
		break;

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
