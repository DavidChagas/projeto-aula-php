<?php 

$valorA = 10;

function soma($valor = 40){
	global $valorA;
	return $valorA + $valor;
}

$somatorio = soma();
echo "<p>$somatorio";

?>