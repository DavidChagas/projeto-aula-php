<?php

session_start();

include '../Persistence/Conexao.php';
include '../Model/ReceitasModel.php';
include '../DAO/ReceitasDAO.php';

if(isset($_GET['operacao'])){

	switch ($_GET['operacao']){

		// 
		// CADASTRAR
		// 
		case 'cadastrar':
			if( (!empty($_POST['descricao'])) && (!empty($_POST['valor'])) && (!empty($_POST['data'])) && 
				(!empty($_POST['conta_id'])) && (!empty($_POST['categoria_receita_id'])) && 
				(!empty($_POST['recebido'])) ){

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
					header("location:../View/Receitas/ReceitasViewListar.php");
                }else{
                	echo 'Erro ao inserir receita';
                }
	        }else{
				echo 'Informe todos os campos!';
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
			header("location:../View/Receitas/ReceitasViewListar.php");
		break;

		//
		// EDITAR
		//
		case 'editar':
			if( (!empty($_POST['descricao'])) && (!empty($_POST['valor'])) && (!empty($_POST['data'])) && 
				(!empty($_POST['conta_id'])) && (!empty($_POST['categoria_receita_id'])) && 
				(!empty($_POST['recebido'])) ){

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
					header("location:../View/Receitas/ReceitasViewListar.php");
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
	}
}
  
