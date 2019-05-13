<?php

include '../../conexao.php';

$conexao = getConexao();

$sql = "SELECT * FROM usuarios WHERE login = :login";

$stmt = $conexao->prepare($sql);
$stmt->bindValue(":login", 'David');
$stmt->execute();

$resultado = $stmt->fetchAll();

foreach ($resultado as $valor) {
	echo 'Senha: '. $valor['senha'];
}