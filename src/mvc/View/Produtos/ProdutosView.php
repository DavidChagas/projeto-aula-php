<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastro de Produtos</title>
	</head>

	<body>
		<form action="../../Controller/ProdutoController.php" method="post" name="cadastroProduto">
			<input type="text" name="descricao" id="descricao" placeholder="Descrição"/><br>
			<input type="text" name="codigoReferencia" id="codigo" placeholder="Código de referência"/><br>
			<input type="text" name="marca" id="marca" placeholder="Marca"/><br>
			
			<input type="submit" name="btCadastrar" id="btCadastrar" value="Cadastrar" />
			<input type="reset" name="btLimpar" id="btLimpar" value="Limpar"/>
		</form>
	</body>
</html>