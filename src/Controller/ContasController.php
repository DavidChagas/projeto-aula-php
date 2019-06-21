<?php

session_start();
include '../Persistence/Conexao.php';
include '../Model/ContasModel.php';
include '../DAO/ContasDAO.php';

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
                	// Busca no banco as informacoes atualizadas para ir para a pág listar
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
		// LISTAR
		// 
		case 'listar':
			$contasDao = new ContasDAO();

			$contas = array();
			$usuario_id = $_SESSION['usuario_id'];
			$contas = $contasDao->buscarContas($usuario_id);
			$_SESSION['contas'] = serialize($contas);
			header("location:../View/Contas/ContasViewListar.php");
		break;

		//
		// EDITAR
		//
		case 'editar':
		
			if( (!empty($_POST['tipo'])) && (!empty($_POST['saldo'])) && (!empty($_POST['limite_despesas']))){
				$conta = new ContasModel();

				$conta->id =  $_GET['conta_id'];
                $conta->tipo = $_POST['tipo'];
                $conta->saldo = $_POST['saldo'];
                $conta->limite_despesas = $_POST['limite_despesas'];

                $contasDao = new ContasDAO();

                if($contasDao->EditarConta($conta)){
                	// Busca no banco as informacoes atualizadas para ir para a pág listar
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
		// EXCLUIR
		//
		case 'excluir':
			$contasDao = new ContasDAO();
			$conta_id = $_GET['id'];

			if($contasDao->excluirConta($conta_id)){
				$contas = array();
				$usuario_id = $_SESSION['usuario_id'];
				$contas = $contasDao->buscarContas($usuario_id);
				$_SESSION['contas'] = serialize($contas);
				header("location:../View/Contas/ContasViewListar.php");
			}else{
				echo 'Erro ao excluir';
			}
		break;
	}
}
