<?php 

class Celular{
	var $nome;
	var $marca;
	var $tamTela;
	var $memInterna;
	var $memRAM;
	var $preco;

	function Celular($nome,$marca,$tamTela,$memInterna,$memRAM,$preco){
		$this->nome = $nome;
		$this->marca = $marca;
		$this->tamTela = $tamTela;
		$this->memInterna = $memInterna;
		$this->memRAM = $memRAM;
		$this->preco = $preco;
	}

	function mostrarCelular(){
		$celular = $this->nome." ".$this->marca." ".$this->tamTela." ".$this->memInterna." ".$this->memRAM." ".$this->preco;
		return $celular  ;
	}
}

$iPhone = new Celular('Iphone','Apple','6.1','128 GB','3 GB','5.000,00');
echo $iPhone->mostrarCelular();

$Galaxy = new Celular('Galaxy S10','Samsumg','6.1','100 GB','4 GB','4.000,00');
echo $Galaxy->mostrarCelular();

$iPhone = new Celular('Iphone','Apple','6.1','128 GB','3 GB','5.000,00');
echo $iPhone->mostrarCelular();

?>