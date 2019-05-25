<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro de Cliente efetuado</title>
	</head>
	<body>
		<h1>Resultado</h1>
		<?php 
			if(isset ($_GET['user']) && isset($_GET['mail'])){
				echo '<br>Usuário:'.$_GET['user'].'<br>Email:'.$_GET['mail'];
			}
		?>
	</body>
</html>