<?php

	$quilometros = 100;

	$carro = 'tipo_a';

	switch($carro){
		case 'tipo_a':
			echo $quilometros / 12 . " litros";
			break;
		case 'tipo_b':
			echo $quilometros / 9 . " litros";
			break;
		case 'tipo_c':
			echo $quilometros / 8 . " litros";
			break;
	}

?>