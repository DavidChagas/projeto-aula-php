<?php

include 'conexao.php';

$conexao = getConexao();

function validaLogin($login, $senha){
	$sql = "SELECT * FROM usuarios WHERE login = :login && senha = :senha";
	
	global $conexao;
	$stmt = $conexao->prepare($sql);

	$stmt->bindValue(':login', $login);
	$stmt->bindValue(':senha', $senha);
	$stmt->execute();

	$resultado = $stmt->fetchAll();
	
	return $resultado;
}