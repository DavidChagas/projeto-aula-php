<?php 

class Conta {
	var $saldo;

	function Conta($valor){
		$this->saldo = $valor;
	}

	function Saldo(){
		return $this->saldo;
	}

	function Credito($valor){
		$this->saldo += $valor;
	}
}

class NovaConta extends Conta{
	var $limite;

	function LimiteDisponivel(){
		return $this->limite;
	}
}

// inicio do pragrama

$contaDavid = new Conta(2000);

echo $contaDavid->Saldo();

?>