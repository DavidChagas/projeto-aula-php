<?php

session_start();

include '../Include/ReceitasValidate.php';
include '../Persistence/Conexao.php';
include '../Model/ReceitasModel.php';
include '../DAO/ReceitasDAO.php';

if(isset($_GET['operacao'])){

	switch ($_GET['operacao']){

		// 
		// CADASTRAR
		// 
		case 'cadastrar':
			$erros = array();

			if( (!empty($_POST['descricao'])) && (!empty($_POST['valor'])) && (!empty($_POST['data'])) && 
				(!empty($_POST['conta_id'])) && (!empty($_POST['categoria_receita_id'])) && 
				(!empty($_POST['recebido'])) ){

				if(!ReceitasValidate::validaValorPositivo($_POST['valor'])){
					$erros[] = 'O valor não pode ser negativo!';
				}

				if(count($erros) == 0){
					$receita = new ReceitasModel();

	                $receita->conta_id = $_POST['conta_id'];
	                $receita->categoria_receita_id = $_POST['categoria_receita_id'];
	                $receita->descricao = $_POST['descricao'];
	                $receita->valor = $_POST['valor'];
	                $receita->data = $_POST['data'];
	                $receita->recebido = $_POST['recebido'];

	                $receitasDao = new ReceitasDAO();

	                if($receitasDao->inserirReceita($receita)){
	                	$receitasDao = new ReceitasDAO();

						$receitas = array();
						$usuario_id = $_SESSION['usuario_id'];
						$receitas = $receitasDao->buscarReceitasUsuario($usuario_id);
						$_SESSION['receitas'] = serialize($receitas);
						$_SESSION['filtro_ano_receitas'] = "";
						$_SESSION['filtro_mes_receitas'] = "";
						header("location:../View/Receitas/ReceitasViewListar.php");
	                }else{
	                	echo 'Erro ao inserir receita';
	                }
                }else{
					$err = serialize($erros);
					$_SESSION['erros'] = $err;
					header("location:../View/Receitas/ReceitasViewError.php?"."erros=$err");
				}
	        }else{
	        	$erros[] = 'Informe todos os campos!';
				$err = serialize($erros);
				$_SESSION['erros'] = $err;
				header("location:../View/Receitas/REceitasViewError.php?"."erros=$err");
			}
		break;
		
		// 
		// LISTAR
		// 
		case 'listar':
			$receitasDao = new ReceitasDAO();

			$receitas = array();
			$usuario_id = $_SESSION['usuario_id'];
			$receitas = $receitasDao->buscarReceitasUsuario($usuario_id);
			$_SESSION['receitas'] = serialize($receitas);
			$_SESSION['filtro_ano_receitas'] = "";
			$_SESSION['filtro_mes_receitas'] = "";
			header("location:../View/Receitas/ReceitasViewListar.php");
		break;

		//
		// EDITAR
		//
		case 'editar':
			$erros = array();

			if( (!empty($_POST['descricao'])) && (!empty($_POST['valor'])) && (!empty($_POST['data'])) && 
				(!empty($_POST['conta_id'])) && (!empty($_POST['categoria_receita_id'])) && 
				(!empty($_POST['recebido'])) ){

				if(!ReceitasValidate::validaValorPositivo($_POST['valor'])){
					$erros[] = 'O valor não pode ser negativo!';
				}

				if(count($erros) == 0){

					$receita = new ReceitasModel();
	                $receitasDao = new ReceitasDAO();

					$receita->id = $_GET['receita_id'];
	                $receita->conta_id = $_POST['conta_id'];
	                $receita->categoria_receita_id = $_POST['categoria_receita_id'];
	                $receita->descricao = $_POST['descricao'];
	                $receita->valor = $_POST['valor'];
	                $receita->data = $_POST['data'];
	                $receita->recebido = $_POST['recebido'];
	                
					if($receitasDao->EditarReceita($receita)){
	                	// Busca no banco as informacoes atualizadas para ir para a pág listar
	                	$receitasDao = new ReceitasDAO();

						$receitas = array();
						$usuario_id = $_SESSION['usuario_id'];
						$receitas = $receitasDao->buscarReceitasUsuario($usuario_id);
						$_SESSION['receitas'] = serialize($receitas);
						$_SESSION['filtro_ano_receitas'] = "";
						$_SESSION['filtro_mes_receitas'] = "";
						header("location:../View/Receitas/ReceitasViewListar.php");
	                }else{
	                	echo 'Erro ao editar';
	                }
	            }else{
					$err = serialize($erros);
					$_SESSION['erros'] = $err;
					header("location:../View/Receitas/ReceitasViewError.php?"."erros=$err");
				}
	        }else{
				$erros[] = 'Informe todos os campos!';
				$err = serialize($erros);
				$_SESSION['erros'] = $err;
				header("location:../View/Receitas/ReceitasViewError.php?"."erros=$err");
			}
		break;

		//
		// EXCLUIR
		//
		case 'excluir':
			$receitasDao = new ReceitasDAO();
			$receita_id = $_GET['id'];

			if($receitasDao->excluirReceita($receita_id)){
				$receitas = array();
				$usuario_id = $_SESSION['usuario_id'];
				$receitas = $receitasDao->buscarReceitasUsuario($usuario_id);
				$_SESSION['receitas'] = serialize($receitas);
				header("location:../View/Receitas/ReceitasViewListar.php");
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

				$receitasDao = new ReceitasDAO();

				$receitas = array();
				$usuario_id = $_SESSION['usuario_id'];
				$receitas = $receitasDao->buscarReceitasUsuarioFiltradas($usuario_id, $mes, $ano);
				$_SESSION['receitas'] = serialize($receitas);
				$_SESSION['filtro_ano_receitas'] = $ano;
				$_SESSION['filtro_mes_receitas'] = $mes;
				header("location:../View/Receitas/ReceitasViewListar.php");
			}else{
				$erros[] = 'Informe todos os campos!';
				$err = serialize($erros);
				$_SESSION['erros'] = $err;
				header("location:../View/Receitas/ReceitasViewError.php?erros=$err&pag=listar");
			}
		break;
	}
}
  
