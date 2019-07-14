<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <!-- Bootstrap CSS -->
	    <link href="../../../css/style.css" rel="stylesheet" type="text/css" />
	    <link rel="stylesheet" href="../../../node_modules/bootstrap/compiler/bootstrap.css">
		
		<title>Cadastro de Conta com Erro</title>
		<link href="../../../images/logo-php.png" rel="icon" type="image/x-png" />
	</head>
	<body>
		<div id="usuario-view-error">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="imagem">
							<img src="../../../images/error.png">
						</div>
						<div class="titulo">Erro!</div>
						<div class="erros">
							<?php 
								session_start();
								if(isset($_GET['erros'])){
									$erros = array();
									$erros = unserialize($_GET['erros']);
									
									foreach ($erros as $e) {
										echo '<br />' . $e;
									}
								}
							?>
						</div>
						<a href="ContasViewCadastrar.php"><button class="btn btn-primary">Voltar</button></a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>