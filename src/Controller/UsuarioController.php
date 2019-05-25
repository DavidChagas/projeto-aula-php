<?php

include '../model/UsuarioModel.php';

if( (!empty($_POST['nome'])) && (!empty($_POST['email'])) && (!empty($_POST['senha'])) && (!empty($_POST['saldo'])) ) {
	echo "todos campos informados";
}else{
	echo "Informe todos os campos!";
}
