<?php  

	$a = 10;
	$b = 60;
	$c = 2;
	$d = 20;

	$soma = $a + $d;
	$divisao = $b / $c;
	echo "soma $soma <br>";
	echo "divisao $divisao <br>";

	if($soma > $divisao){
		echo "A soma é maior que a divisão";
	}elseif ($soma < $divisao) {
		echo "A soma é menor que a divisão";
	} else {
		echo "A soma é igual a divisão";
	}

?>