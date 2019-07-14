<?php 
	class ReceitasValidate{

		public static function validaValorPositivo($valor){
			if($valor >= 0){
				return true;
			}else{
				return false;
			}
		}
	}
?>