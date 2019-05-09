<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro de Cliente com Erro</title>
	</head>
	<body>
		<h1>ERROS!</h1>
		<?php 
			if(isset($_GET['erros'])){
				$erros = array();
				$erros = unserialize($_GET['erros']);

				foreach ($erros as $e) {
					echo '<br />' . $e;
				}
			}
		?>
	</body>
</html>