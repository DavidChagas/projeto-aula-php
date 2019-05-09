<?php 

function substitui(&$valorA, $valorB){
	$aux = $valorA;
	$valorA = $valorB;
	$valorB = $aux;
	echo "<p> vA: $$valorA e vB: $valorB - NA função";
}

$vA = 10;
$vB = 500;
echo "<p> vA: $vA e vB: $vB - antes da função";
substitui($vA, $vB);
echo "<p>vA: $vA e vB: $vB - depois da função";
?>