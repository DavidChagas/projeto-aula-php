<?php 

function teste_1(){
	static $valor = 5;
	echo $valor;
	$valor++;
}

function teste_2(){
	$valor = 5;
	echo $valor;
	$valor++;
}

teste_1();
teste_2();
teste_1();
teste_2();
?>