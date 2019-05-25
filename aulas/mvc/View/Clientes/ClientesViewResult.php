<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro de Cliente efetuado com sucesso!!</title>
	</head>
	<body>
		<h1>Resultado</h1>
		<?php 
			
				echo '<br>Cliente: '.$_SESSION['nome'].
				'<br>Data de nascimento: '. date("d-m-Y", strtotime($_SESSION['dataNascimento'])) .
				'<br>CPF: '.$_SESSION['cpf'].
				'<br>Sexo: '.$_SESSION['sexo'].
				'<br>Profissão: '.$_SESSION['profissao'].
				'<br>Telefone: '.$_SESSION['telefone'].
				'<br>Celular: '.$_SESSION['celular'].
				'<br>Email: '.$_SESSION['email'].
				'<br>CEP: '.$_SESSION['cep'].
				'<br>Endereço: '.$_SESSION['endereco'].
				'<br>Número: '.$_SESSION['numero'].
				'<br>Complemento: '.$_SESSION['complemento'].
				'<br>Bairro: '.$_SESSION['bairro'].
				'<br>Cidade: '.$_SESSION['cidade'].
				'<br>Estado: '.$_SESSION['estado'].
				'<br>Obs: '.$_SESSION['observacao'];

				unset($_SESSION['nome']);
				unset($_SESSION['dataNascimento']); 
				unset($_SESSION['cpf']);
				unset($_SESSION['sexo']);
				unset($_SESSION['profissao']);
				unset($_SESSION['telefone']);
				unset($_SESSION['celular']);
				unset($_SESSION['email']);
				unset($_SESSION['cep']);
				unset($_SESSION['endereco']);
				unset($_SESSION['numero']);
				unset($_SESSION['complemento']);
				unset($_SESSION['bairro']);
				unset($_SESSION['cidade']);
				unset($_SESSION['estado']);
				unset($_SESSION['observacao']);
			
		?>
	</body>
</html>