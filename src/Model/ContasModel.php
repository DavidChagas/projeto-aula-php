<?php 

class ContasModel {
	private $id;
	private $usuario_id;
	private $tipo;
	private $saldo;
	
	public function __construct(){}

	public function __set($propriedade, $valor){
		$this->$propriedade = $valor;
	}

	public function __get($propriedade){
		return $this->$propriedade;
	}
}