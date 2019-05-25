<?php

include '../../conexao.php';

$conexao = getConexao();

$sql = "INSERT INTO usuarios (login, senha) VALUES ('Lucas','lucas')";

if($conexao->exec($sql)){
	echo 'Salvo com sucesso';
}else{
	echo 'Erro com sucesso';
}

// Não recomendável pois poderá ser inserido uma sql injection