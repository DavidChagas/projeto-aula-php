<?php

$count = 0;

while ($count <= 1000) {
	if(($count % 9) == 0){
		echo $count;
	}
	$count ++;
}

do{
	if(($count % 2) == 0){
		echo $count;
	}
	$count ++;
}while($count <= 1000);

?>