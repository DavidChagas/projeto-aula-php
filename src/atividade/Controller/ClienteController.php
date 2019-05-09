<?php 

	include '../Model/UserModel.php';
	include '../Include/UserValidate.php';

	if( (!empty($_POST['nome'])) && 
		(!empty($_POST['dataNascimento'])) &&
		(!empty($_POST['cpf'])) && 
		(!empty($_POST['sexo'])) &&
		(!empty($_POST['profissao'])) && 
		(!empty($_POST['telefone'])) && 
		(!empty($_POST['celular'])) &&
		(!empty($_POST['email'])) &&
		(!empty($_POST['cep'])) &&
		(!empty($_POST['endereco'])) &&
		(!empty($_POST['numero'])) &&
		(!empty($_POST['complemento'])) &&
		(!empty($_POST['bairro'])) &&
		(!empty($_POST['cidade'])) &&
		(!empty($_POST['estado'])) &&
		(!empty($_POST['observacao'])) )
	{
		$erros = array();

		if(!UserValidate::testarEmail($_POST['email'])){
			$erros[] = 'Email inválido!';
		}

		if(!UserValidate::validaCPF($_POST['cpf'])){
			$erros[] = 'CPF inválido!';
		}

		if(count($erros) == 0){
			$user = new UserModel();

			$user->nome = $_POST['nome'];
			$user->dataNascimento = $_POST['dataNascimento'];
			$user->cpf = $_POST['cpf'];
			$user->sexo = $_POST['sexo'];
			$user->profissao = $_POST['profissao'];
			$user->telefone = $_POST['telefone'];
			$user->celular = $_POST['celular'];
			$user->email = $_POST['email'];
			$user->cep = $_POST['cep'];
			$user->endereco = $_POST['endereco'];
			$user->numero = $_POST['numero'];
			$user->complemento = $_POST['complemento'];
			$user->bairro = $_POST['bairro'];
			$user->cidade = $_POST['cidade'];
			$user->estado = $_POST['estado'];
			$user->observacao = $_POST['observacao'];

			header("location:../View/UserView/UserViewResult.php?"."user=$user->nome&"."mail=$user->email");
		}else{
			$err = serialize($erros);

			header("location:../View/UserView/UserViewError.php?"."erros=$err");
		}

	}else{
		echo "Informe todos os campos!";
	}

?>