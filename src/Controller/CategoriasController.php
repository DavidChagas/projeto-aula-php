<?php

session_start();
include '../Persistence/Conexao.php';
include '../Model/CategoriasModel.php';
include '../DAO/CategoriasDAO.php';

if(isset($_GET['operacao'])){

	switch ($_GET['operacao']){

		// 
		// CADASTRAR
		// 
		case 'cadastrar':
			if( (!empty($_POST['nome'])) ){
				$categoria = new CategoriasModel();

                $categoria->usuario_id = $_SESSION['usuario_id'];
                $categoria->tipo = $_GET['tipo'];
                $categoria->nome = $_POST['nome'];
                
                $categoriasDao = new CategoriasDAO();

                if($categoriasDao->inserirCategoria($categoria)){
                	// Busca no banco as informacoes atualizadas para ir para a pág listar
                	$categoriasDao = new CategoriasDAO();

					$categorias = array();
					$usuario_id = $_SESSION['usuario_id'];
					$categorias = $categoriasDao->buscarCategorias($usuario_id, $_GET['tipo']);
					$_SESSION['categorias'] = serialize($categorias);
					header("location:../View/Categorias/CategoriasViewListar.php");
                }else{
                	echo 'Erro ao inserir categoria';
                }
	        }else{
				echo 'Informe o nome da categoria!';
			}
		break;
		
		// 
		// LISTAR
		// 
		case 'listar':
			$categoriasDao = new CategoriasDAO();

			$categorias = array();
			$usuario_id = $_SESSION['usuario_id'];
			$tipo = $_GET['tipo'];
			$categorias = $categoriasDao->buscarCategorias($usuario_id, $tipo);
			$_SESSION['categorias'] = serialize($categorias);
			$_SESSION['tipo_categoria'] = $tipo;
			header("location:../View/Categorias/CategoriasViewListar.php");
		break;

		//
		// EDITAR
		//
		case 'editar':
		
			if( (!empty($_POST['nome'])) ){
				$categoria = new CategoriasModel();

				$categoria->id =  $_GET['categoria_id'];
                $categoria->tipo = $_POST['tipo'];
                $categoria->nome = $_POST['nome'];
                
                $categoriasDao = new CategoriasDAO();

                if($categoriasDao->EditarCategoria($categoria)){
                	// Busca no banco as informacoes atualizadas para ir para a pág listar
                	$categoriasDao = new CategoriasDAO();

					$categorias = array();
					$usuario_id = $_SESSION['usuario_id'];
					$categorias = $categoriasDao->buscarCategorias($usuario_id, $_POST['tipo']);
					$_SESSION['categorias'] = serialize($categorias);
					header("location:../View/Categorias/CategoriasViewListar.php");
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
			$categoriasDao = new CategoriasDAO();
			$categoria_id = $_GET['id'];
			$tipo = $categoriasDao->buscarTipoCategoria($categoria_id);

			if($categoriasDao->excluirCategoria($categoria_id)){
				// Aqui executo o case listar para atualizar a lista
				$usuario_id = $_SESSION['usuario_id'];
				$categorias = array();
				$categorias = $categoriasDao->buscarCategorias($usuario_id, $tipo);
				$_SESSION['categorias'] = serialize($categorias);
				
				header("location:../View/Categorias/CategoriasViewListar.php");
			}else{
				echo 'Erro ao excluir';
			}
		break;
	}
}
