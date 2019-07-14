<?php 
	class ContasValidate{

		public static function validaSaldoPositivo($saldo){
			if($saldo >= 0){
				return true;
			}else{
				return false;
			}
		}

		public static function validaLimite($saldo, $limite){
			if($saldo > $limite){
				return true;
			}else{
				return false;
			}
		}
	}
?>