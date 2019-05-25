<?php  

	$altura = 1.74;
	$sexo = 'mulher';

	if($sexo == 'homem'){
		$peso = (72.7 * $altura) - 58;
		echo "Seu peso ideal é $peso kg";
	}else{
		$peso = (62.1 * $altura) - 44;
		echo "Seu peso ideal é $peso kg";
	}
	
?>