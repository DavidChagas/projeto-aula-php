<?php

	$a = 1;
	$b = -1;
	$c = 0;

	if ($a > $b && $a > $c){
		echo $a;
	}elseif ($b > $a && $b > $c){
		echo $b;
	}else{
		echo $c;
	}

?>