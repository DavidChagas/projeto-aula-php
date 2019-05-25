<?php

include '../../conexao.php';

$conexao = getConexao();

$sql = 'DELETE FROM usuarios WHERE id = :id';

$stmt = $conexao->prepare($sql); // stmt = statement

$id = 2;
$stmt->bindValue(':id', $id);


if($stmt->execute()){
	echo 'Excluido com sucesso!!!';
}else{
	echo 'Erro ao excluir';
}