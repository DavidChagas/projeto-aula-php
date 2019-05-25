<?php 

function teste(){
	static $valor = 5;
	echo "<p>$valor";
	$valor++;
}

teste();
teste();

?>