<?php 

class UserValidate{

	public static function testarIdade($paramIdade){
		if(is_numeric($paramIdade)){
			return true;
		}else{
			return false;
		}
	}

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