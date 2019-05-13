<?php  

session_start();
include '../model/usuarios_model.php';

$login = $_POST['login'];
$senha = $_POST['senha'];

if(validaLogin($login, $senha)){
	$_SESSION['usuario_ativo'] = true;
	header("location:../view/home/home.html");
}else{
	header("location:../loginError.php");
}


?>