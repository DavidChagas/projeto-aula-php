<?php

session_start();

include '../Include/UsuarioValidate.php';
include '../Persistence/Conexao.php';
include '../Model/UsuarioModel.php';
include '../DAO/UsuarioDAO.php';

if(isset($_GET['operacao'])){

	switch ($_GET['operacao']){

		// 
		// CADASTRAR
		// 
		case 'cadastrar':
			$erros = array();
			
			if( (!empty($_POST['nome'])) && (!empty($_POST['cpf'])) && (!empty($_POST['email'])) && (!empty($_POST['senha'])) && (!empty($_POST['saldo_total']) || $_POST['saldo_total'] == 0)){

				if(!UsuarioValidate::testarEmail($_POST['email'])){
					$erros[] = 'Email inválido!';
				}
				if(!UsuarioValidate::validaCPF($_POST['cpf'])){
					$erros[] = 'CPF inválido!';
				}
				if(!UsuarioValidate::validaSaldoPositivo($_POST['saldo_total'])){
					$erros[] = 'O saldo não pode ser negativo!';
				}

				if(count($erros) == 0){
	                $usuario = new UsuarioModel();

	                $usuario->nome = $_POST['nome'];
	                $usuario->cpf = $_POST['cpf'];
	                $usuario->email = $_POST['email'];
	                $usuario->senha = $_POST['senha'];
	                $usuario->saldo_total = $_POST['saldo_total'];

	                $usuarioDao = new UsuarioDAO();

	                if($usuarioDao->inserirUsuario($usuario)){
	                	header("location:../../index.php");
	                }
	                	            	
		        }else{
					$err = serialize($erros);
					$_SESSION['erros'] = $err;
					header("location:../View/Usuario/UsuarioViewError.php?"."erros=$err");
				}

			}else{
				$erros[] = 'Informe todos os campos!';
				$err = serialize($erros);
				$_SESSION['erros'] = $err;
				header("location:../View/Usuario/UsuarioViewError.php?"."erros=$err");
			}
		break;
		
		// 
		// CONSULTAR
		// 
		case 'listar':
			$usuarioDao = new UsuarioDAO();
			$usuario = $usuarioDao->buscaUsuario($_SESSION['usuario_id']);

			$_SESSION['usuario'] = serialize($usuario); 
			
			header("location:../View/Usuario/UsuarioViewListar.php");
		break;

		//
		// EDITAR
		//
		case 'editar':
			$erros = array();
		
			if( (!empty($_POST['nome'])) && (!empty($_POST['cpf'])) && (!empty($_POST['email'])) && (!empty($_POST['senha'])) && (!empty($_POST['saldo_total']) || $_POST['saldo_total'] == 0)){

				if(!UsuarioValidate::testarEmail($_POST['email'])){
					$erros[] = 'Email inválido!';
				}
				if(!UsuarioValidate::validaCPF($_POST['cpf'])){
					$erros[] = 'CPF inválido!';
				}
				if(!UsuarioValidate::validaSaldoPositivo($_POST['saldo_total'])){
					$erros[] = 'O saldo não pode ser negativo!';
				}

				if(count($erros) == 0){
					$usuario = new UsuarioModel();

					$usuario->id =  $_GET['usuario_id'];
	                $usuario->nome = $_POST['nome'];
	                $usuario->cpf = $_POST['cpf'];
	                $usuario->email = $_POST['email'];
	                $usuario->senha = $_POST['senha'];
	                $usuario->saldo_total = $_POST['saldo_total'];

	                $usuarioDao = new UsuarioDAO();

	                if($usuarioDao->EditarUsuario($usuario)){
	                	
						header("location:../../index.php");
	                }else{
	                	echo 'Erro ao inserir conta';
	                }
	            }else{
					$err = serialize($erros);
					$_SESSION['erros'] = $err;
					header("location:../View/Usuario/UsuarioViewError.php?"."erros=$err"."usuarioId=".$_GET['usuario_id']);
				}
	        }else{
				$erros[] = 'Informe todos os campos!';
				$err = serialize($erros);
				$_SESSION['erros'] = $err;
				header("location:../View/Usuario/UsuarioViewError.php?"."erros=$err"."usuarioId=".$_GET['usuario_id']);
			}
		break;


		//
		// EXCLUIR
		//
		case 'excluir':
			$usuarioDao = new UsuarioDAO();
			$usuario_id = $_SESSION['usuario_id'];

			if($usuarioDao->excluirUsuario($usuario_id)){
				header("location:../../index.php");
			}else{
				echo 'Erro ao excluir';
			}
		break;

		//
		// LOGAR
		//
		case 'logar':
			if( (!empty($_POST['login'])) && (!empty($_POST['senha'])) ){

				$usuarioDao = new UsuarioDAO();
				$resultado = $usuarioDao->validaLogin($_POST['login'], $_POST['senha']);

				if($resultado){
					$usuario =  $resultado[0];
					$_SESSION['usuario_logado'] = true;
					$_SESSION['usuario_id']  = $usuario['id'];
					$_SESSION['usuario_nome'] = $usuario['nome'];

					header("location:../View/Home/Home.php");
				}else{
					header("location:../../loginError.php");
				}
			}else{
				header("location:../../loginError.php");
			}
		break;

		//
		// SAIR
		//
		case 'sair':
			$_SESSION['usuario_logado'] = false;
			$_SESSION['usuario_id']  = 0;
			header("location:../../index.php");
		break;
	}
}
