<?php  

	$soma = 0;

	for ($i=0; $i <= 1000 ; $i++) { 
		if($i % 8 == 0){
			$soma = $soma + $i;		
		}
	}

	echo "$soma";

?>