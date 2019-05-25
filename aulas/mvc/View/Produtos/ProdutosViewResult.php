<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro de Produto efetuado com sucesso!!</title>
	</head>
	<body>
		<h1>Resultado</h1>
		<?php 
			if(isset ($_SESSION['descricao']) && isset($_SESSION['codigoReferencia']) && isset($_SESSION['marca'])){
				echo '<br>Produto:'.$_SESSION['descricao'].'<br>Código de referência:'.$_SESSION['codigoReferencia'].'<br>Marca:'.$_SESSION['marca'];

				unset($_SESSION['descricao']);
				unset($_SESSION['codigoReferencia']);
				unset($_SESSION['marca']);
			}
		?>
	</body>
</html>
