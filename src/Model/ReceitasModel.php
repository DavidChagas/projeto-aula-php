<?php 

class ReceitasModel {
	private $id;
	private $conta_id;
	private $categoria_receita_id;
	private $descricao;
	private $valor;
	private $data;
	private $recebido;

	public function __construct(){}

	public function __set($propriedade, $valor){
		$this->$propriedade = $valor;
	}

	public function __get($propriedade){
		return $this->$propriedade;
	}
}