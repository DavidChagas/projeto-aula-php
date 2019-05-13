<?php

function getConexao(){
	$dns = 'mysql:host=localhost;dbname=projeto-aula-php;charset=utf8';
	$usuario = 'root';
	$senha = '';

	$pdo = new PDO($dns, $usuario, $senha);

	return $pdo;
}