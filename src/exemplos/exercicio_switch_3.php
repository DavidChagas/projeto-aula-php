<?php

	$janeiro = 1;
	$fevereiro = 2;
	$marco = 3;
	$abril = 4;
	$maio = 5;
	$junho = 6;
	$julho = 7;
	$agosto = 8;
	$setembro = 9;
	$outubro = 10;
	$novembro = 11;
	$dezenbro = 12;

	switch ($agosto) {
		case 12:
		case 1:
		case 2:
		case 6:
		case 7:
			echo "Alta temporada";
			break;
		case 3:
		case 4:
		case 5:
		case 8:
		case 9:
		case 10:
		case 11:
			echo "Baixa temporada";
			break;
	}

?>