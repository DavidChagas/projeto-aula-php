<?php

$numero_a = 30;
$numero_b = 10;

$metade = ($numero_a + $numero_b) / 2;

if($numero_a > $numero_b){
	$maior = $numero_a;
	$menor = $numero_b;
}else{
	$maior = $numero_b;
	$menor = $numero_a;
}

$cont = $menor;

while ($cont <= $maior) {
	if($cont == $metade){
		echo "Cheguei na metade: $cont";
	}
	$cont ++;
}

do{
	if($cont == $metade){
		echo "Cheguei na metade";
	}
	$cont ++;
}while($cont <= $numero_b)

?>