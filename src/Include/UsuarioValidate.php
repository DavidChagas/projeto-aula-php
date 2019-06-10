<?php 

class UsuarioValidate{

	public static function testarEmail($paramEmail){
		$Sintaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
		if(preg_match($Sintaxe, $paramEmail)){
			return true;
		}else{
			return false;
		}
	}

}

?>