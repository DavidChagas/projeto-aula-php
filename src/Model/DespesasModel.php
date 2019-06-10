<?php 

class DespesasModel {
	private $id;
	private $conta_id;
	private $categoria_despesa_id;
	private $descricao;
	private $valor;
	private $data;
	private $pago;

	public function __construct(){}

	public function __set($propriedade, $valor){
		$this->$propriedade = $valor;
	}

	public function __get($propriedade){
		return $this->$propriedade;
	}
}