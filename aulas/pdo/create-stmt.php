<?php

include '../../conexao.php';

$conexao = getConexao();

// Consultas modo 1
// $sql = 'INSERT INTO usuarios (login, senha) VALUES (?,?)';

// Consultas modo 2
$sql = 'INSERT INTO usuarios (login, senha) VALUES (:login,:senha)';


$stmt = $conexao->prepare($sql); // stmt = statement

// 
// bindValue
// 
// $stmt->bindValue(1, 'João');
// $stmt->bindValue(2, '12345');

// 
// bindParam modo 1
//
// $login = 'José';
// $senha = '123456';
// $stmt->bindValue(1, $login);
// $stmt->bindValue(2, $senha);

// 
// bindParam modo 2
// 
$login = 'Maria';
$senha = '1234567';
$stmt->bindValue(':login', $login);
$stmt->bindValue(':senha', $senha);


if($stmt->execute()){
	echo 'Salvo com sucesso!!!';
}else{
	echo 'Erro ao salvar';
}