<?php 

class CategoriaDespesaModel {
	private $id;
	private $nome;
	
	public function __construct(){}

	public function __set($propriedade, $valor){
		$this->$propriedade = $valor;
	}

	public function __get($propriedade){
		return $this->$propriedade;
	}
}