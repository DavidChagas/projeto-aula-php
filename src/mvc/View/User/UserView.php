<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastro de Usuários</title>
	</head>

	<body>
		<form action="../../Controller/UserController.php" method="post" name="cadUser">
			<input type="text" name="txtUser" id="txtUser" placeholder="Usuario"/><br>
			<input type="text" name="txtNome" id="txtNome" placeholder="Nome"/><br>
			<input type="text" name="txtSobrenome" id="txtSobrenome" placeholder="Sobrenome"/><br>
			<input type="text" name="txtEmail" id="txtEmail" placeholder="email@email.com"/><br>
			<input type="text" name="txtIdade" id="txtIdade" placeholder="Idade"/><br>
			<input type="password" name="pwdSenha" id="pwdSenha" placeholder="Senha"/><br>
			<input type="submit" name="btCadastrar" id="btCadastrar" value="Cadastrar" />
			<input type="reset" name="btLimpar" id="btLimpar" value="Limpar"/>
		</form>
	</body>
</html>
