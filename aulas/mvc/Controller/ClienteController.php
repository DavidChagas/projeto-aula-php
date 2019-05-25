<?php 
	session_start();

	include '../Model/ClienteModel.php';
	include '../Include/ClienteValidate.php';

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

		if(!ClienteValidate::testarEmail($_POST['email'])){
			$erros[] = 'Email inválido!';
		}

		if(!ClienteValidate::validaCPF($_POST['cpf'])){
			$erros[] = 'CPF inválido!';
		}

		if(count($erros) == 0){
			$cliente = new ClienteModel();

			$cliente->nome = $_POST['nome'];
			$cliente->dataNascimento = $_POST['dataNascimento'];
			$cliente->cpf = $_POST['cpf'];
			$cliente->sexo = $_POST['sexo'];
			$cliente->profissao = $_POST['profissao'];
			$cliente->telefone = $_POST['telefone'];
			$cliente->celular = $_POST['celular'];
			$cliente->email = $_POST['email'];
			$cliente->cep = $_POST['cep'];
			$cliente->endereco = $_POST['endereco'];
			$cliente->numero = $_POST['numero'];
			$cliente->complemento = $_POST['complemento'];
			$cliente->bairro = $_POST['bairro'];
			$cliente->cidade = $_POST['cidade'];
			$cliente->estado = $_POST['estado'];
			$cliente->observacao = $_POST['observacao'];

			$_SESSION['nome'] = $cliente->nome;
			$_SESSION['dataNascimento'] = $cliente->dataNascimento;
			$_SESSION['cpf'] = $cliente->cpf;
			$_SESSION['sexo'] = $cliente->sexo;
			$_SESSION['profissao'] = $cliente->profissao;
			$_SESSION['telefone'] = $cliente->telefone;
			$_SESSION['celular'] = $cliente->celular;
			$_SESSION['email'] = $cliente->email;
			$_SESSION['cep'] = $cliente->cep;
			$_SESSION['endereco'] = $cliente->endereco;
			$_SESSION['numero'] = $cliente->numero;
			$_SESSION['complemento'] = $cliente->complemento;
			$_SESSION['bairro'] = $cliente->bairro;
			$_SESSION['cidade'] = $cliente->cidade;
			$_SESSION['estado'] = $cliente->estado;
			$_SESSION['observacao'] = $cliente->observacao;
			header("location:../View/Clientes/ClientesViewResult.php");
		}else{
			$err = serialize($erros);

			header("location:../View/Clientes/ClientesViewError.php?"."erros=$err");
		}

	}else{
		echo "Informe todos os campos!";
	}

?>