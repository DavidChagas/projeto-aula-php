<?php

session_start();

include '../Model/UsuarioModel.php';
include '../DAO/UsuarioDAO.php';

if(isset($_GET['operacao'])){
	switch ($_GET['operacao']){
		case 'cadastrar':
			if( (!empty($_POST['nome'])) && (!empty($_POST['cpf'])) && (!empty($_POST['email'])) && (!empty($_POST['senha'])) && (!empty($_POST['saldo_total']))){

				$erros = array();

				// if(!UserValidate::testarIdade($_POST['txtIdade'])){
				// 	$erros[] = 'Idade inválida!';
				// }
				// if(!UserValidate::testarEmail($_POST['txtEmail'])){
				// 	$erros[] = 'Email inválido!';
				// }

		
				if(count($erros) == 0){
	                $usuario = new UsuarioModel();

	                $usuario->nome = $_POST['nome'];
	                $usuario->cpf = $_POST['cpf'];
	                $usuario->email = $_POST['email'];
	                $usuario->senha = $_POST['senha'];
	                $usuario->saldo_total = $_POST['saldo_total'];

	                $usuarioDao = new UsuarioDAO();

	                if($usuarioDao->inserirUsuario($usuario)){
	                	$_SESSION['usuario'] = $usuario->nome;
	                	header("location:../../index.php");
	                }
	                	            	
		        }else{
					$err = serialize($erros);
					$_SESSION['erros'] = $err;
					header("location:../View/User/UserViewError.php");
				}

			}else{
				echo "Informe todos os campos!";
			}
		break;
		
		case 'consultar':
			
		break;

		case 'excluir':
			echo "Aqui é excluir";
		break;

		case 'logar':
			if( (!empty($_POST['login'])) && (!empty($_POST['senha'])) ){

				$usuarioDao = new UsuarioDAO();

				if($usuarioDao->validaLogin($_POST['login'], $_POST['senha'])){
					header("location:../View/home/home.html");
				}else{
					header("location:../../loginError.php");
				}
			}
		break;
	}
}
