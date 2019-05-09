<?php  

	$nota1 = 8;
	$nota2 = 6;
	$nota3 = 5;
	$nota4 = 9;

	$media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;
	echo "$media <br>";

	if($media >= 7){
		echo "Aprovado";
	}elseif($media < 7 && $media >= 5){
		echo "Recuperação";
	}else{
		echo "Reprovado";
	}

?>