<?php

include '../../conexao.php';

$conexao = getConexao();

$sql = 'UPDATE usuarios SET login = :login WHERE id = :id';

$stmt = $conexao->prepare($sql); // stmt = statement

$login = 'João atualizado';
$id = 2;
$stmt->bindValue(':login', $login);
$stmt->bindValue(':id', $id);


if($stmt->execute()){
	echo 'Atualizado com sucesso!!!';
}else{
	echo 'Erro ao atualizar';
}