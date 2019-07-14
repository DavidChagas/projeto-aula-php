<?php

session_start();

include '../Include/DespesasValidate.php';
include '../Persistence/Conexao.php';
include '../Model/DespesasModel.php';
include '../DAO/DespesasDAO.php';

if(isset($_GET['operacao'])){

	switch ($_GET['operacao']){

		// 
		// CADASTRAR
		// 
		case 'cadastrar':
			$erros = array();

			if( (!empty($_POST['descricao'])) && (!empty($_POST['valor'])) && (!empty($_POST['data'])) && 
				(!empty($_POST['conta_id'])) && (!empty($_POST['categoria_despesa_id'])) && 
				(!empty($_POST['pago'])) ){

				if(!DespesasValidate::validaValorPositivo($_POST['valor'])){
					$erros[] = 'O valor não pode ser negativo!';
				}

				if(count($erros) == 0){
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
					$err = serialize($erros);
					$_SESSION['erros'] = $err;
					header("location:../View/Despesas/DespesasViewError.php?"."erros=$err");
				}
	        }else{
				$erros[] = 'Informe todos os campos!';
				$err = serialize($erros);
				$_SESSION['erros'] = $err;
				header("location:../View/Despesas/DespesasViewError.php?"."erros=$err");
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
			$_SESSION['filtro_ano_despesas'] = "";
			$_SESSION['filtro_mes_despesas'] = "";
			header("location:../View/Despesas/DespesasViewListar.php");
		break;

		//
		// EDITAR
		//
		case 'editar':
			$erros = array();

			if( (!empty($_POST['descricao'])) && (!empty($_POST['valor'])) && (!empty($_POST['data'])) && 
				(!empty($_POST['conta_id'])) && (!empty($_POST['categoria_despesa_id'])) && 
				(!empty($_POST['pago'])) ){

				if(!DespesasValidate::validaValorPositivo($_POST['valor'])){
					$erros[] = 'O valor não pode ser negativo!';
				}

				if(count($erros) == 0){

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
						$_SESSION['filtro_ano_despesas'] = "";
						$_SESSION['filtro_mes_despesas'] = "";
						header("location:../View/Despesas/DespesasViewListar.php");
	                }else{
	                	echo 'Erro ao editar';
	                }
	            }else{
					$err = serialize($erros);
					$_SESSION['erros'] = $err;
					header("location:../View/Despesas/DespesasViewError.php?"."erros=$err");
				}
	        }else{
				$erros[] = 'Informe todos os campos!';
				$err = serialize($erros);
				$_SESSION['erros'] = $err;
				header("location:../View/Despesas/DespesasViewError.php?"."erros=$err");
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

		//
		// FILTRAR
		//
		case 'filtrar':
			if( (!empty($_POST['filtroMes'])) && (!empty($_POST['filtroAno'])) ){
				$mes = $_POST['filtroMes'];
				$ano = $_POST['filtroAno'];

				$despesasDao = new DespesasDAO();

				$despesas = array();
				$usuario_id = $_SESSION['usuario_id'];
				$despesas = $despesasDao->buscarDespesasUsuarioFiltradas($usuario_id, $mes, $ano);
				$_SESSION['despesas'] = serialize($despesas);
				$_SESSION['filtro_ano_despesas'] = $ano;
				$_SESSION['filtro_mes_despesas'] = $mes;
				header("location:../View/Despesas/DespesasViewListar.php");
			}else{
				$erros[] = 'Informe todos os campos!';
				$err = serialize($erros);
				$_SESSION['erros'] = $err;
				header("location:../View/Despesas/DespesasViewError.php?erros=$err&pag=listar");
			}
		break;
	}
}
