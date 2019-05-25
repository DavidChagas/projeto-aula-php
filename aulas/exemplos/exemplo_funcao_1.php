<?php

function soma($x,$y){
	return ($x+$y);
}

function espera(){
	$x;
	for($x=0; $x<9999; $x++);
}

$a;
espera();
$b = 50;
espera();
$a = 10;
$b -= $a;
echo soma($a, $b);

?>