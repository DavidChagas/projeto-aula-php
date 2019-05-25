<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastro de Clientes</title>
	</head>

	<body>
		<form action="../../Controller/UserController.php" method="post" name="cadastroCliente">
			<input type="text" name="nome" id="nome" placeholder="Nome Completo"/><br>
			<input type="date" name="dataNascimento" id="dataNascimento"><br>
			<input type="text" name="cpf" id="cpf" placeholder="CPF"/><br>
			<input type="text" name="sexo" id="sexo" placeholder="Sexo"/><br>
			<input type="text" name="profissao" id="profissao" placeholder="Profissão"/><br>
			<input type="text" name="telefone" id="telefone" placeholder="Telefone"/><br>
			<input type="text" name="celular" id="celular" placeholder="Celular"/><br>
			<input type="text" name="email" id="email" placeholder="email@email.com"/><br>
			<input type="text" name="cep" id="cep" placeholder="CEP"/><br>
			<input type="text" name="endereco" id="endereco" placeholder="Endereço"/><br>
			<input type="text" name="numero" id="numero" placeholder="Número"/><br>
			<input type="text" name="complemento" id="complemento" placeholder="Complemento"/><br>
			<input type="text" name="bairro" id="bairro" placeholder="Bairro"/><br>
			<input type="text" name="cidade" id="cidade" placeholder="Cidade"/><br>
			<input type="text" name="estado" id="estado" placeholder="Estado"/><br>
			<textarea name="observacao" id="observacao" placeholder="Observação" rows="3"></textarea><br>
			<input type="submit" name="btCadastrar" id="btCadastrar" value="Cadastrar" />
			<input type="reset" name="btLimpar" id="btLimpar" value="Limpar"/>
		</form>
	</body>
</html>