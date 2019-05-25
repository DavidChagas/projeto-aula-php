<?php 

$numero_a = 5;
$numero_b = 30;

$metade = ($numero_a + $numero_b) / 2;
$soma = 0;

if($numero_a > $numero_b){
	$maior = $numero_a;
	$menor = $numero_b;
}else{
	$maior = $numero_b;
	$menor = $numero_a;
}

for ($i=$menor+1; $i < $maior; $i=$i+5) { 
	echo "$i || ";
}

?>
